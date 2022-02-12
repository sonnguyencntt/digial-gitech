<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $link_folder = "/images/banner/";
    protected $fillable = ["title" , "image_url" , "store_code"];
    public $timestamps = true;

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
        return $this->hasOne(Store::class , "store_code" , "store_code");
    }
}
