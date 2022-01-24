<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Repositories\Internet\InternetRepositoryInterface;
use App\Http\Requests\Internet\CreateInternetRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

use App\Http\Controllers\Controller;

class ServiceInternetController extends Controller
{
    protected $internetRepo;
    protected $categoryRepo;
    protected $title = "Dịch vụ Internet";
    protected $linkFolder = "/images/Internet";


    public function __construct(InternetRepositoryInterface $internetRepo , CategoryRepositoryInterface $categoryRepo )
    {
        $this->internetRepo = $internetRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {
        $listInternets = $this->internetRepo->getAll($store_code);
        return \view("pages.admin.internet.index" , ["store_code"=> $store_code , 'listInternets' => $listInternets , 'title' => $this->title]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($store_code)
    {
        $listCategories = $this->categoryRepo->getAll($store_code);

        return \view("pages.admin.internet.create" , ["store_code"=> $store_code ,'title' => $this->title , 'listCategories' => $listCategories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInternetRequest $request , $store_code)
    {
        try{
            $this->internetRepo->create(
                array_merge($request->all(), ['store_code' => $store_code])
                );
            return redirect()->route("manage.service_internet.index" , $store_code)->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
    public function show($id ,  $store_code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $store_code,$id)
    {
        $internet = $this->internetRepo->findByStore($id , $store_code);
        $listCategories = $this->categoryRepo->getAll($store_code);

        return \view("pages.admin.internet.edit" , ["store_code"=>$store_code , 'internet'=>$internet , 'title' => $this->title ,  'listCategories' => $listCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $store_code,$id)
    {
        try{
            $this->internetRepo->updateByStore($id ,  $store_code ,$request->all());
            return redirect()->route("manage.service_internet.index" , $store_code)->with(["status"=> 201 , "alert" => "success",  "msg"=>"Cập nhật dữ liệu thành công"]);
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
    public function destroy($store_code,$id)
    {
        try {
            $this->internetRepo->deleteByStore($id , $store_code);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
