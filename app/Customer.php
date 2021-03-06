<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = true;
    public function store()
    {
        return $this->hasOne(Store::class , "store_code" , "store_code");
    }
}
