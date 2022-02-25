<?php

namespace App\Jobs\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Mail;
class SendMailVerifyRegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user=null)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $user = $this->user;
            Mail::send('pages.user.emails.register', \compact("user"), function ($email) use ($user) {
                $email->subject("Thiết kế web Gitech - Xác nhận tài khoản");
                $email->from($address = \env("DOMAIN_NAME"), $name = 'Thiết kế Web Gitech');
                $email->to($user->email, $user->name);
                
            });
        } catch (\Throwable $th) {
           \Log::channel("jobs")->info($th);
        }
    }
}
