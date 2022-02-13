<?php

namespace App\Http\Composers\User;

use Illuminate\View\View;
use App\Repositories\Store\StoreRepositoryInterface;
use Auth;
use Illuminate\Support\Arr;
class StoreComposer
{
    protected $fillable = [];
    protected $fillable_contains = ["user" ];
    protected $guarded = ["auth"];
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
    public function guarded($value){
        $exsit = false;
        foreach ($this->guarded as $key => $item) {
            if (str_contains($value, $item) ) {

                $exsit = true;
                break;
            }
        }
        return $exsit;
    }

    public function compose(View $view)
    {
        $agree = false;
        foreach ($this->fillable_contains as  $value) {
            if (str_contains($view->getName(), $value) and !$this->guarded($view->getName())) {

                $agree = true;
            }
        }
        if ($agree)
        {
            $user = Auth::user();
            $user_id = $user ? $user->id : null;
            $view->with('stores', $this->storeRepo->getAll($user_id));
        }
      
    }
}
