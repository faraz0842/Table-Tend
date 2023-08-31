<?php

namespace App\Providers;

use App\Models\MailSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    // /**
    //  * Bootstrap services.
    //  *
    //  * @return void
    //  */
    // public function boot()
    // {
    //     if (Schema::hasTable('mail_settings')) {
    //         $mailsetting = MailSetting::first();
    //         if ($mailsetting) {
    //             $data = [
    //                 'driver' => 'smtp',
    //                 'host' => $mailsetting->mail_host,
    //                 'port' => $mailsetting->mail_port,
    //                 'encryption' => $mailsetting->mail_encryption,
    //                 'username' => $mailsetting->mail_username,
    //                 'password' => $mailsetting->mail_password,
    //                 'from' => [
    //                     'address' => $mailsetting->mail_from,
    //                     'name' => 'CentoFood',
    //                 ],
    //             ];
    //             Config::set('mail', $data);
    //         }
    //     }
    // }
}
