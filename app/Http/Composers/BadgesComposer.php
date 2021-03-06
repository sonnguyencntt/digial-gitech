<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class BadgesComposer
{
    protected $excepts = [];
    
    public function __construct()
    {

    }

    public function get()
    {
        return [
            "store_code" => \request()->store_code ?? null,
            "domain" => \request()->getHost()
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('badges', (object) $this->get());
        
    }
}