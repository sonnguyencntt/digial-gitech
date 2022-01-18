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
    public function index()
    {
        $listInternets = $this->internetRepo->all();
        return \auto_redirect(\view("pages.admin.internet.index" , ['listInternets' => $listInternets , 'title' => $this->title]) ,  $listInternets);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategories = $this->categoryRepo->getAll();

        return \auto_redirect(\view("pages.admin.internet.create" , ['title' => $this->title , 'listCategories' => $listCategories]) , "ajax");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInternetRequest $request)
    {
        try{
            $this->internetRepo->create($request->all());
            return redirect("/service/internet")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
        $internet = $this->internetRepo->findById($id);
        $listCategories = $this->categoryRepo->getAll();

        return \auto_redirect(\view("pages.admin.internet.edit" , ['internet'=>$internet , 'title' => $this->title ,  'listCategories' => $listCategories]) , "ajax");
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
        try{
            $this->internetRepo->updateById($id , $request->all());
            return redirect("/service/internet")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Cập nhật dữ liệu thành công"]);
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
            $this->internetRepo->deleteById($id);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
