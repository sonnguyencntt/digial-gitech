<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    protected $fillable = [
         "name", "image_url", "discount", "price", "category_id", "description", "color",    "storage", "resolution",    "connection",    "noise_reduction_in_low_light",    "balance_white_light", "water_resistant", "insurance", "customer_care", "store_code"
    ];
    public $timestamps = true;
    protected $link_folder = "/images/camera/";

    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }
    public function getImageUrlAttribute($value)
    {
        return $this->link_folder . $value;
    }
    public function store()
    {
        return $this->hasOne(Store::class, "store_code", "store_code");
    }
}
