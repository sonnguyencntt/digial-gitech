<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $link_folder = "/images/theme/";
    protected $fillable = [
        "logo",
        "address",
        "hotline",
        "email",
        "id_zalo",
        "id_facebook",
        "id_youtube",
        "domain",
        "iframe_position",
        "post_id_privacy_policy",
        "post_id_payment_policy",
        "post_id_website_terms_of_use",
        "store_code"

    ];
    public $timestamps = true;

    public function getLogoAttribute($value)
    {
        return $this->link_folder . $value;
    }
    public function store()
    {
        return $this->hasOne(Store::class, "store_code", "store_code");
    }
}
