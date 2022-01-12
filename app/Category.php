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
        return $this->hasOne(Internet::class , 'category_id' , 'id');
    }
    public function camera()
    {
        return $this->hasOne(Camera::class , 'category_id' , 'id');
    }
}
