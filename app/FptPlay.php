<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FptPlay extends Model
{
    protected $table = "fpt_plays";
    protected $fillable = [
        "price",  "description", "name", "category_id", "store_code" 
    ];
    public $timestamps = true;
    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }
    public function store()
    {
        return $this->hasOne(Store::class, "store_code", "store_code");
    }
}
