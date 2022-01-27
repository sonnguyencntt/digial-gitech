<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\internet\InternetRepositoryInterface;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\category\CategoryRepositoryInterface;
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
    public function index($store_code)
    {   
        $listInternet=$this->internetRepo->all();
        $listBanner=$this->bannerRepo->getAll();
        $listProduct=$this->categoryRepo->distinct();
        $listAllCategory=$this->categoryRepo->getAll();
        $listCamera=$this->cameraRepo->getAll();
        $listposts=$this->postsRepo->getThreePosts();
    
        
        return view("pages.home.index",['listProduct'=>$listProduct,'listBanner'=>$listBanner,'listCamera'=>$listCamera,'listPosts'=>$listposts,'listAllCategory'=>$listAllCategory,'status'=>201]);
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
