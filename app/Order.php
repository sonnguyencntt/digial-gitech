<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function internet()
    {
        return $this->hasOne(Internet::class , 'id' , 'product_id');
    }
}
