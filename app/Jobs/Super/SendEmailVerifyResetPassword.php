<?php

namespace App\Jobs\Super;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class SendEmailVerifyResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $admin;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($admin=null)
    {
        $this->admin = $admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admin = $this->admin;
        Mail::send('pages.super.emails.forget_password', \compact("admin"), function ($email) use ($admin) {
            $email->subject("Thiết kế web Gitech - Quên mật khẩu");
            $email->to($admin->email, $admin->name);
        });
    }
}
