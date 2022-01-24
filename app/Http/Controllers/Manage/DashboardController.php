<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\Camera\CameraRepositoryInterface;
use App\Repositories\Play\PlayRepositoryInterface;
use App\Repositories\Internet\InternetRepositoryInterface;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Store;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $postsRepo;
    protected $customerRepo;
    protected $orderRepo;
    protected $fptPlayRepo;
    protected $cameraRepo;
    protected $internetRepo;



    protected $title = "Bảng điều khiển";


    public function __construct(customerRepositoryInterface $customerRepo, PostsRepositoryInterface $postsRepo,
     OrderRepositoryInterface $orderRepo,
     PlayRepositoryInterface $fptPlayRepo,
     InternetRepositoryInterface $internetRepo,
     CameraRepositoryInterface $cameraRepo
     )
    {
        $this->customerRepo = $customerRepo;
        $this->postsRepo = $postsRepo;
        $this->orderRepo = $orderRepo;
        $this->fptPlayRepo = $fptPlayRepo;
        $this->cameraRepo = $cameraRepo;
        $this->internetRepo = $internetRepo;
    }

    public function index($store_code)
    {

        $countCustomer = $this->customerRepo->count($store_code);
        $countPosts = $this->postsRepo->count($store_code);
        $countOrder = $this->orderRepo->count($store_code);
        $countFptPlay = $this->fptPlayRepo->count($store_code);
        $countCamera = $this->cameraRepo->count($store_code);
        $countInternet = $this->internetRepo->count($store_code);


        return \auto_redirect(\view("pages.admin.dashboard.index", ["countInternet"=> $countInternet , "countCamera"=> $countCamera,"countFptPlay" => $countFptPlay , "store_code" => $store_code, "countCustomer" => $countCustomer, "countPosts" => $countPosts, "countOrder" => $countOrder,  "title" => $this->title]), "ajax");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
