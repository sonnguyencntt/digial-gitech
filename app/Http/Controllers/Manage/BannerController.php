<?php

namespace App\Http\Controllers\Manage;

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
    public function index()
    {
        $listBanners = $this->bannerRepo->getAll();
        return \auto_redirect(\view("pages.admin.banner.index" , ['listBanners' => $listBanners , 'title' => $this->title]) ,  $listBanners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \auto_redirect(\view("pages.admin.banner.create" , ['title' => $this->title]) , "ajax");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBannerRequest $request)
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
            ]);
            return redirect("/banner")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
    public function edit($id)
    {
        $banner = $this->bannerRepo->findById($id);
        return \auto_redirect(\view("pages.admin.banner.edit" , ['banner'=>$banner , 'title' => $this->title]) , "ajax");
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
                $this->bannerRepo->updateById($id,[
                    'title'=>$request->title,
      
                ]);
                try {
                    $file_path = $this->linkFolder . $request->image_url_string;
                    if(File::exists($file_path)) 
                    File::delete($file_path);
                } catch (\Throwable $th) {
                    return redirect("/banner")->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Cập dữ không liệu thành công"]);
                }
            }
            else
            {
                $this->bannerRepo->updateById($id,[
                    'title'=>$request->title,
             
                    'image_url'=>$fileName,

                ]);
            }


            return redirect("/banner")->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Cập nhật dữ liệu thành công"]);
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
    public function destroy($id)
    {
        try {
            $this->bannerRepo->deleteById($id);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
