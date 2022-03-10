<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Cache;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Repositories\PaymentHistory\PaymentHistoryRepositoryInterface;
use Carbon\Carbon;
use DB;

class ChangeStatusOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:change_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status order when date expired or create order when date paid amount';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(StoreRepositoryInterface $storeRepo, PaymentHistoryRepositoryInterface $paymentRepo)
    {
        \Log::channel('jobs')->info("cron " . $this->signature . "đang chạy...");
        try {
            if (Cache::has('admin_configs') and isset(Cache::get('admin_configs')->cron_time_for_order)) {
                $adminConfigs = Cache::get('admin_configs');
                $cronTime = $adminConfigs->cron_time_for_order;
                $now = Carbon::now();

                $carbonNow = Carbon::parse($now);


                $minutesConfig = strtotime($adminConfigs->created_at) / 60;

                $minutesNow = strtotime($now) / 60;


                if (($minutesConfig - $minutesNow) % $cronTime == 0) {
                    $stores = $storeRepo->getWithUser();

                    foreach ($stores as $key => $store) {
                        if ($store->status  == "WORKING") {

                            if ($store->payment_history) {
                                $timeExpired = $store->payment_history->date_expired;

                                $carbonConfig = Carbon::parse($timeExpired);
                                $subtract = $carbonNow->diffInDays($carbonConfig, false);
                                if ($store->payment_history->payment_status == 0 and $subtract > 3 and $store->status !== "STOP_WORKING") {
                                    $storeRepo->updateById($store->id, ["status" => "STOP_WORKING"]);
                                } else if ($store->payment_history->payment_status == 1) {
                                    if ($subtract <= -2) {
                                        try {
                                            DB::beginTransaction();

                                            $resultPayment =  $paymentRepo->create([
                                                "order_code" => \Str::random(12),
                                                "paid_amount" => 0,
                                                "payment_status" => 0,
                                                "store_code" => $store->store_code,
                                                "date_expired" => Carbon::parse($store->payment_history->date_expired)->addDays(30)
                                            ]);

                                            $storeRepo->updateById($store->id, ["order_id" => $resultPayment->id]);
                                            DB::commit();
                                        } catch (\Throwable $th) {
                                            \Log::channel("jobs")->info($th);

                                            DB::rollBack();
                                        }
                                    }
                                } else {
                                }
                            }
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            \Log::channel("jobs")->info($th);
        }
    }
}
