<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $link_folder = "/images/banner/";
    protected $guarded = [];
    public $timestamps = true;

    public function getImageUrlAttribute($value)
    {
        return $this->link_folder . $value;
    }
    public function store()
    {
        return $this->hasOne(Store::class , "store_code" , "store_code");
    }
}
