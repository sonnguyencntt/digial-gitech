<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function internet()
    {
        return $this->hasOne(Internet::class , 'id' , 'product_id');
    }
    public function store()
    {
        return $this->hasOne(Store::class , "store_code" , "store_code");
    }
}
