<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Http\Requests\Banner\CreateBannerRequest;
use File;
class BannerController extends Controller
{


    protected $bannerRepo;
    protected $title = "Banner";
    protected $linkFolder = "/images/banner";

    public function __construct(BannerRepositoryInterface $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {
        $listBanners = $this->bannerRepo->getAll($store_code);
        return \view("pages.user.banner.index" , [ 'listBanners' => $listBanners , 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($store_code)
    {
        return \view("pages.user.banner.create" , [ 'title' => $this->title]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBannerRequest $request , $store_code)
    {
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $fileName=time().'-'.'banner.'.$etx;
                $file->move(public_path($this->linkFolder),$fileName);
            }
            $this->bannerRepo->create([
                'title'=>$request->title,
                'image_url'=>$fileName,
                'store_code' => $store_code
            ]);
            return redirect()->route("user.banner.index" , $store_code)->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
        }

        catch(\throwable $err){
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
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
    public function edit($store_code,$id)
    {
        $banner = $this->bannerRepo->findByStore($id , $store_code);
        return \view("pages.user.banner.edit" , [ 'banner'=>$banner , 'title' => $this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $store_code , $id)
    {
        $fileName = null;
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $fileName=time().'-'.'banner.'.$etx;
                $file->move(public_path($this->linkFolder),$fileName);
            }

            if($fileName == null)
            {
                $this->bannerRepo->updateByStore($id,$store_code,[
                    'title'=>$request->title,
      
                ]);
                try {
                
                } catch (\Throwable $th) {
                    return redirect()->route("user.banner.index" , $store_code)->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Cập dữ không liệu thành công"]);
                }
            }
            else
            {
                $this->bannerRepo->updateByStore($id,$store_code,[
                    'title'=>$request->title,
                    'image_url'=>$fileName,
                ]);
                $file_path = public_path($request->image_url_string);
                if (File::exists($file_path))
                    File::delete($file_path);
            }


            return redirect()->route("user.banner.index" , $store_code)->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Cập nhật dữ liệu thành công"]);
        }

        catch(\throwable $err){
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($store_code , $id)
    {
        
        try {
            $this->bannerRepo->deleteByStore($id , $store_code);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
