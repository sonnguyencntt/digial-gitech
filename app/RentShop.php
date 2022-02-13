<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentShop extends Model
{
    protected $table = "rent_shops";
    protected $fillable = [
        "name", "price", "note" 
    ];
    public $timestamps = true;

}
