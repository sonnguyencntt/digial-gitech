<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Repositories\Theme\ThemeRepository;
use Auth;
use App\Repositories\Theme\ThemeRepositoryInterface;

class HomeController extends Controller
{
    protected $storeRepo;
    protected $themeRepo;

    protected $title = "Cửa hàng";
    protected $domain_name;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(StoreRepositoryInterface $storeRepo , ThemeRepository $themeRepo)
    {
        $this->storeRepo = $storeRepo;
        $this->themeRepo = $themeRepo;
        $this->domain_name = \config("app.short_url");

    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $store = $this->storeRepo->getFristOrderById($user_id);

        if($store)
        return \redirect()->route("user.dashboard.index" , $store->store_code);
        return \redirect()->route("user.home.show_stores");

    }
    public function showStores()
    {
        $user_id = Auth::user()->id;

        $countIsWaiting = $this->storeRepo->countForStatus("WAITING" , $user_id);
        $countIsWorking = $this->storeRepo->countForStatus("WORKING" , $user_id);
        $countIsStopWorking = $this->storeRepo->countForStatus("STOP_WORKING" , $user_id);
        $listStores = $this->storeRepo->getAll($user_id);
        return\view("pages.user.store.index" , ["countIsWaiting"=> $countIsWaiting ,"domain_name"=> $this->domain_name ,  "countIsWorking" => $countIsWorking , "countIsStopWorking" => $countIsStopWorking , "listStores" => $listStores ,   "title" => $this->title]);
    }
    
}
