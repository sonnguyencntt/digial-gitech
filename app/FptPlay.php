<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FptPlay extends Model
{
    protected $table = "fpt_plays";
    protected $guarded = [];
    public $timestamps = true;
    public function category()
    {
        return $this->hasOne(Category::class , "id" , "category_id");
    }
}
