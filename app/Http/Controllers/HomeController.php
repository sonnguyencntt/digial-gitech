<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Internet\InternetRepositoryInterface;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Camera\CameraRepositoryInterface;
use App\Repositories\Posts\PostsRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(InternetRepositoryInterface $internetRepo,BannerRepositoryInterface $bannerRepo,CategoryRepositoryInterface $categoryRepo,CameraRepositoryInterface $cameraRepo,PostsRepositoryInterface $postsRepo)
    {
        $this->internetRepo = $internetRepo;
        $this->bannerRepo = $bannerRepo;
        $this->categoryRepo = $categoryRepo;
        $this->cameraRepo = $cameraRepo;
        $this->postsRepo = $postsRepo;
    }
    public function index(Request $request , $domain)
    {   
        $store_code =  $request->store_code;
        // $listInternet=$this->internetRepo->all();
        $listBanner=$this->bannerRepo->getAll($store_code);
        $listInternet=$this->categoryRepo->distinct($store_code);
        $listCamera=$this->cameraRepo->getAll($store_code);
       
        $listposts=$this->postsRepo->getAll($store_code);

        
        
        return view("pages.home.index",['listInternet'=>$listInternet,'listBanner'=>$listBanner,'listCamera'=>$listCamera,'listPosts'=>$listposts,'status'=>201]);
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
        return \response()->json($request->all() , 200);
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
