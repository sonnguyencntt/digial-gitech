<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Camera\CameraRepositoryInterface;
use App\Http\Requests\Camera\UpdateCameraRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use File;
class ServiceCameraController extends Controller
{


    protected $cameraRepo;
    protected $categoryRepo;
    protected $title = "Dịch vụ Camera";
    protected $link_folder = "/images/camera";


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
    public function index()
    {
        $list_camera = $this->cameraRepo->all();
        return \auto_redirect(\view("pages.admin.camera.index" , ['list_camera' => $list_camera , 'title' => $this->title]) ,  $list_camera);
    
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
        $camera = $this->cameraRepo->findById($id);
        $list_categories = $this->categoryRepo->getAll();

        return \auto_redirect(\view("pages.admin.camera.edit" , ['camera'=>$camera , 'title' => $this->title ,  'list_categories' => $list_categories]) , "ajax");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCameraRequest $request, $id)
    {
        $file_name = null;
 
        try{
            if($request->has('image_url')){
                $file=$request->image_url;
                $etx=$request->image_url->extension();
                $file_name=time().'-'.'camera.'.$etx;
                $file->move(public_path($this->link_folder),$file_name);
            }

            if($file_name == null)
            {
                $this->cameraRepo->updateById($id,$request->except("image_url_string"));
                try {
                    $file_path = $this->link_folder . $request->image_url_string;
                    if(File::exists($file_path)) 
                    File::delete($file_path);
                } catch (\Throwable $th) {
                    return redirect("/service/camera")->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Cập dữ không liệu thành công"]);
                }
            }
            else
            {
              
                $this->cameraRepo->updateById($id,array_merge($request->except("image_url_string"), ['image_url' => $file_name]));
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
    public function destroy($id)
    {
        //
    }
}
