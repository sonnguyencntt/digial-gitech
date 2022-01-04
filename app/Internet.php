<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet extends Model
{
    public function category()
    {
        return $this->hasOne(Category::class , "id" , "category_id");
    }
}
