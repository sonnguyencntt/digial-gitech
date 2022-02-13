<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminConfig extends Model
{
    protected $table = "admin_configs";

    protected $fillable = [
        'store_sample_code' , 'document_point_domain'
    ];}
