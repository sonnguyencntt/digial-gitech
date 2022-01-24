<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name', 'address', "status" , "store_code" , "user_id"
    ];

    public function user()
    {
        return $this->hasOne(User::class , "id" , "user_id");
    }
}
 