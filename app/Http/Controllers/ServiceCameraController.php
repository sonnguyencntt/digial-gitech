<?php

namespace App\Http\Controllers;
use App\Repositories\play\PlayRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Camera\CameraRepositoryInterface;
class ServiceCameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(cameraRepositoryInterface $cameraRepo,PlayRepositoryInterface $playRepo )
    {
        $this->cameraRepo = $cameraRepo;
        $this->playRepo = $playRepo;
        
    }
    public function index()
    {   
        $getFirstID=$this->cameraRepo->getFirstID();
        $getSecondID=$this->cameraRepo->getSecondID();
        $getCategoryName=$this->cameraRepo->getCategoryName();
        $title=$getCategoryName->category->name;
        return view("pages.service_camera.index",['getFirstID'=>$getFirstID,'getSecondID'=>$getSecondID,'title'=>$title,'status'=>200]) ;

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
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        \Log::info($input);
   
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($store_code,$cameraID)
    {   
        $getCategoryName=$this->cameraRepo->getCategoryName();
        // dd($getCategoryName->id);
        $storage=$this->playRepo->getAllPlay($store_code,$getCategoryName->category->id);
        $getFirstID=$this->cameraRepo->getFirstID();
        $getSecondID=$this->cameraRepo->getSecondID();
        
        
        
        return view("pages.service_camera.index",['getFirstID'=>$getFirstID,'getSecondID'=>$getSecondID,'cateogryName'=>$getCategoryName,'storage'=>$storage,'status'=>200]) ;
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
