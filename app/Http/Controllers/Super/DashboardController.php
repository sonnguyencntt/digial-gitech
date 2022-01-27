<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Store\StoreRepositoryInterface;

class DashboardController extends Controller
{

    protected $userRepo;
    protected $storeRepo;



    protected $title = "Bảng điều khiển";

    public function __construct(UserRepositoryInterface $userRepo, StoreRepositoryInterface $storeRepo)
   {
       $this->userRepo = $userRepo;
       $this->storeRepo = $storeRepo;

   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $countAllUser = $this->userRepo->count();
        $countUserIsNotActive = $this->userRepo->countByStatus(0);
        $countUserIsActive = $this->userRepo->countByStatus(1);
        $countAllStore = $this->storeRepo->count();
        $countStoreIsWaitng = $this->storeRepo->countByStatus("WAITING");
        $countStoreIsWorking = $this->storeRepo->countByStatus("WORKING");
        $countStoreIsStopWorking = $this->storeRepo->countByStatus("STOP_WORKING");
        return \view("pages.super.dashboard.index" , \compact("title" ,  "countAllUser" ,"countUserIsNotActive" , "countUserIsActive" , "countAllStore" , "countStoreIsWaitng" , "countStoreIsWorking" , "countStoreIsStopWorking" ));

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
