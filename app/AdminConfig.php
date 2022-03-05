<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminConfig extends Model
{
    protected $table = "admin_configs";

    protected $fillable = [
        'store_sample_code', 
        'document_point_domain',
        'momo_user_name',
        'cron_time_for_orde',
        'momo_phone',
        'bank_user_name',
        'bank_name',
        'bank_number',
        'note_for_payment',
    ];
}
