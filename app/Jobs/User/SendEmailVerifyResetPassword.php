<?php

namespace App\Jobs\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class SendEmailVerifyResetPassword implements ShouldQueue
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
        $user = $this->user;
        Mail::send('pages.user.emails.forget_password', \compact("user"), function ($email) use ($user) {
            $email->subject("Thiết kế web Gitech - Quên mật khẩu");
            $email->from(\env("MAIL_USERNAME"),'Thiết kế Web Gitech');

            $email->to($user->email, $user->name);
        });
    }
}
