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
        "store_code",
        "show_icon_zalo",
        "show_icon_youtube",
        "show_icon_facebook"

    ];
    public $timestamps = true;


    public $overrideLogoAttr = null;

    public function getLogoAttribute($value)
    {
        if(!$this->overrideLogoAttr)
        return $this->link_folder . $value;
        else if($this->overrideLogoAttr == "ogrinal")
        return $value;
        else
        return;
    }



    public function store()
    {
        return $this->hasOne(Store::class, "store_code", "store_code");
    }
}
