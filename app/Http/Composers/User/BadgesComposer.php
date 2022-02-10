<?php

namespace App\Http\Composers\User;

use Illuminate\View\View;

class BadgesComposer
{
    protected $fillable = [];
    protected $fillable_contains = ["user"];

    public function __construct()
    {
    }

    public function get()
    {
        return [
            "store_code" => \request()->store_code ?? null,
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
        $agree = false;
        foreach ($this->fillable_contains as  $value) {
            if (str_contains($view->getName(), $value)) {
                $agree = true;
            }
        }
        if ($agree)
            $view->with('badges', (object) $this->get());
    }
}
