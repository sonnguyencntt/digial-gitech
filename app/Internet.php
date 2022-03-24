<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet extends Model
{
    protected $fillable = [
        "price", "size", "description", "name", "category_id", "store_code", "sort_number"
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
