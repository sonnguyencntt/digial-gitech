<?php

namespace App\Http\Composers\User;

use Illuminate\View\View;

class TitleSideBarComposer
{
    protected $excepts = [];

    protected $listTitle = [
        
        "dashboard", "theme", "customer", "category", "internet" , "order" , "banner" , "fpt_play" , "posts", "profile" ,"store", "payment_history"
    ];

    public function __construct()
    {
    }

    public function get()
    {
        return [];
    }

    public function same($view)
    {
        $listTitle = $this->listTitle;
        foreach ($listTitle as  $value) {
            if (str_contains($view, $value)) {
                return $value;
            }
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $title = $this->same($view->getName());
        $view->with('titleSideBar', $title);
    }
}
