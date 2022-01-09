<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    protected $link_folder = "/images/camera/";

    public function category()
    {
        return $this->hasOne(Category::class , "id" , "category_id");
    }
    public function getImageUrlAttribute($value)
    {
        return $this->link_folder . $value;
    }
}
