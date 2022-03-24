<?php

namespace App\Http\Composers\User;

use Illuminate\View\View;
use App\AdminConfig;
use App\Repositories\Store\StoreRepositoryInterface;
use Carbon\Carbon;
class BadgesComposer
{
    protected $fillable = [];
    protected $fillable_contains = ["user"];
    protected $storeRepo;
    public function __construct(StoreRepositoryInterface $storeRepo)
    {
        $this->storeRepo = $storeRepo;
    }

    public function get()
    {
        $admin_config =  AdminConfig::first() ; 
        $store_sample_code = $admin_config?$admin_config->store_sample_code : null;
        $document_point_domain = $admin_config?$admin_config->document_point_domain : null;

        $store_code = \request()->store_code ?? null;
        $date_expired = null;
        if($store_code)
        {
            $store = $this->storeRepo->findByStoreCode($store_code);

            if($store->status == "WORKING" and $store->payment_history)
            {

                if($store->payment_history->payment_status == "1")
                {
                    $now = Carbon::now();
                    $carbonNow = Carbon::parse($now);
                    $carbonExpired = Carbon::parse($store->payment_history->date_expired);
                    $subtract = $carbonExpired->diffInDays($carbonNow, false);
                    if($subtract < 7)
                    {
                        $date_expired = $subtract;
                    }
                }
            }
        }
        if($store_sample_code == null or $store_code == null)
        $is_sample = false;
        else if($store_sample_code === $store_code)
        $is_sample =  true;
        else
        $is_sample =  false;
        return [
            "store_code" => \request()->store_code ?? null,
            "is_sample" =>   $is_sample,
            "document_point_domain" => $document_point_domain,
            "store_sample_code" => $admin_config->store_sample_code ?? null,
            "date_expired" => $date_expired ?? null,
            "admin_configs" => $admin_config
            
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $agree = false;
        foreach ($this->fillable_contains as  $value) {
            if (str_contains($view->getName(), $value)) {
                $agree = true;
            }
        }
        if ($agree)
            $view->with('badges', (object) $this->get());
    }
}
