<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = true;

    public function internet()
    {
        return $this->hasMany(Internet::class , 'category_id' , 'id');
    }
    public function camera()
    {
        return $this->hasOne(Camera::class , 'category_id' , 'id');
    }
    public function store()
    {
        return $this->hasOne(Store::class , "store_code" , "store_code");
    }
}
