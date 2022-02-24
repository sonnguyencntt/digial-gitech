<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name', 'address', "status" , "store_code" , "user_id" , "date_activated" , "rent_shop_id"
    ];

    public function user()
    {
        return $this->hasOne(User::class , "id" , "user_id");
    }
    public function theme()
    {
        return $this->hasOne(Theme::class , "store_code" , "store_code");
    }
    public function rent_shop()
    {
        return $this->hasOne(RentShop::class , "id" , "user_id");
    }
}
 