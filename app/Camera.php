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
        public $overrideImageAttr = null;

    public function getImageUrlAttribute($value)
    {
        if(!$this->overrideImageAttr)
        return $this->link_folder . $value;
        else if($this->overrideImageAttr == "ogrinal")
        return $value;
        else
        return;
    
    }
    public function store()
    {
        return $this->hasOne(Store::class, "store_code", "store_code");
    }
}
