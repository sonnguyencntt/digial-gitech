<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Play\PlayRepositoryInterface;
use App\Http\Requests\Play\CreateplayRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
class ServicePlayController extends Controller
{

    protected $playRepo;
    protected $categoryRepo;
    protected $title = "Dịch vụ play";
    protected $linkFolder = "/images/play";


    public function __construct(playRepositoryInterface $playRepo , CategoryRepositoryInterface $categoryRepo )
    {
        $this->playRepo = $playRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {
        $listFptPlays = $this->playRepo->getAll($store_code);
        return \view("pages.admin.fpt_play.index" , ["store_code"=>$store_code ,'listFptPlays' => $listFptPlays , 'title' => $this->title]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($store_code)
    {
        $listCategories = $this->categoryRepo->getAll($store_code);

        return \view("pages.admin.fpt_play.create" , ["store_code"=>$store_code,'title' => $this->title , 'listCategories' => $listCategories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $store_code)
    {
        try{
            $this->playRepo->create( array_merge($request->all(), ['store_code' => $store_code]));
            return redirect()->route("manage.service_play.index" , $store_code)->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
    public function edit($store_code , $id)
    {
        $fptPlay = $this->playRepo->findByStore($id , $store_code );
        $listCategories = $this->categoryRepo->getAll($store_code);

        return \auto_redirect(\view("pages.admin.fpt_play.edit" , ["store_code" =>$store_code ,'fptPlay'=>$fptPlay , 'title' => $this->title ,  'listCategories' => $listCategories]) , "ajax");
 
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
        try{
            $this->playRepo->updateByStore($id ,  $store_code ,  $request->all());
            return redirect()->route("manage.service_play.index" , $store_code)->with(["status"=> 201 , "alert" => "success",  "msg"=>"Cập nhật dữ liệu thành công"]);
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
    public function destroy( $store_code , $id)
    {
        try {
            $this->playRepo->deleteByStore($id , $store_code);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
