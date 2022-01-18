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
    public function index()
    {
        $listFptPlays = $this->playRepo->all();
        return \auto_redirect(\view("pages.admin.fpt_play.index" , ['listFptPlays' => $listFptPlays , 'title' => $this->title]) ,  $listFptPlays);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategories = $this->categoryRepo->getAll();

        return \auto_redirect(\view("pages.admin.fpt_play.create" , ['title' => $this->title , 'listCategories' => $listCategories]) , "ajax");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->playRepo->create($request->all());
            return redirect("/service/play")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
        $fpt_play = $this->playRepo->findById($id);
        $listCategories = $this->categoryRepo->getAll();

        return \auto_redirect(\view("pages.admin.fpt_play.edit" , ['fpt_play'=>$fpt_play , 'title' => $this->title ,  'listCategories' => $listCategories]) , "ajax");
 
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
            $this->playRepo->updateById($id , $request->all());
            return redirect("/service/play")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Cập nhật dữ liệu thành công"]);
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
            $this->playRepo->deleteById($id);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
