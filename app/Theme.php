<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $link_folder = "/images/theme/";
    protected $guarded = [];
    public $timestamps = true;

    public function getLogoAttribute($value)
    {
        return $this->link_folder . $value;
    }}
