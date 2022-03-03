<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table = "payment_histories";
    protected $fillable = [
        "order_code", "paid_amount", "date_expired", "date_paid", "payment_status", "note", "store_code"
    ];
    public $timestamps = true;
}
