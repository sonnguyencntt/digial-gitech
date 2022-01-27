<?php

namespace App\Http\Composers\User;

use Illuminate\View\View;
use App\Repositories\Store\StoreRepositoryInterface;
use Auth;

class StoreComposer
{
    protected $excepts = [];
    protected $storeRepo;
    
    public function __construct(StoreRepositoryInterface $storeRepo)
    {
        $this->storeRepo = $storeRepo;
    }



    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user_id = Auth::user()->id;
        $view->with('stores', $this->storeRepo->getAll($user_id));
        
    }
}