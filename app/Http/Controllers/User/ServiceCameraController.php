<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Camera\CameraRepositoryInterface;
use App\Http\Requests\Camera\UpdateCameraRequest;
use App\Http\Requests\Camera\CreateCameraRequest;

use App\Repositories\Category\CategoryRepositoryInterface;
use File;
class ServiceCameraController extends Controller
{


    protected $cameraRepo;
    protected $categoryRepo;
    protected $title = "Dịch vụ Camera";
    protected $linkFolder = "/images/camera";


    public function __construct(cameraRepositoryInterface $cameraRepo , CategoryRepositoryInterface $categoryRepo )
    {
        $this->cameraRepo = $cameraRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {

        $listCameras = $this->cameraRepo->getAll($store_code);
        return \auto_redirect(\view("pages.user.camera.index" , [ 'listCameras' => $listCameras , 'title' => $this->title]) ,  $listCameras);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($store_code)
    {
        $listCategories = $this->categoryRepo->getAll($store_code);

        return \view("pages.user.camera.create" , ["listCategories"=>$listCategories ,  'title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCameraRequest $request , $store_code)
    {
        $fileName = null;
 
        try{
            if($request->has('image_url')){
                $file=$request->image_url;
                $etx=$request->image_url->extension();
                $fileName=time().'-'.'camera.'.$etx;
                $file->move(public_path($this->linkFolder),$fileName);
            }

            if($fileName == null)
            {
                $this->cameraRepo->create(
                    array_merge($request->all(), ['store_code' => $store_code])
                   );
                try {
                  
                } catch (\Throwable $th) {
                    return redirect()->route("user.service_camera.index" , $store_code)->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Thêm dữ không liệu thành công"]);
                }
            }
            else
            {
              
                $this->cameraRepo->create(
                    array_merge($request->all(), ['store_code' => $store_code , 'image_url' => $fileName])

                );

            }


            return redirect()->route("user.service_camera.index" , $store_code)->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Cập nhật dữ liệu thành công"]);
        }

        catch(\throwable $err){
            \dd($err);
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
    public function edit( $store_code,$id )
    {
        $camera = $this->cameraRepo->findByStore($id,$store_code);
        $listCategories = $this->categoryRepo->getAll($store_code);

        return \auto_redirect(\view("pages.user.camera.edit" , ['camera'=>$camera , 'title' => $this->title ,  'listCategories' => $listCategories]) , "ajax");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCameraRequest $request,  $store_code, $id)
    {
        $fileName = null;
 
        try{
            if($request->has('image_url')){
                $file=$request->image_url;
                $etx=$request->image_url->extension();
                $fileName=time().'-'.'camera.'.$etx;
                $file->move(public_path($this->linkFolder),$fileName);
            }

            if($fileName == null)
            {
                $this->cameraRepo->updateByStore($id,$store_code , $request->except("image_url_string"));
                try {
                  
                } catch (\Throwable $th) {
                    return redirect("/service/camera")->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Cập dữ không liệu thành công"]);
                }
            }
            else
            {
              
                $this->cameraRepo->updateByStore($id,$store_code ,array_merge($request->except("image_url_string"), ['image_url' => $fileName]));
                $file_path = public_path($request->image_url_string);
                if (File::exists($file_path))
                    File::delete($file_path);
            }


            return redirect("/service/camera")->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Cập nhật dữ liệu thành công"]);
        }

        catch(\throwable $err){
            \dd($err);
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
             $this->cameraRepo->deleteByStore($id,$store_code);
            return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
        }

    }
}
