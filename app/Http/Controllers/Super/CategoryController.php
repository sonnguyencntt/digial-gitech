<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $categoryRepo;
    protected $title = "Danh mục";

    public function __construct(categoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = $this->categoryRepo->getAll();
        return \auto_redirect(\view("pages.super.category.index", ['listCategories' => $listCategories, 'title' => $this->title]),  $listCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Đang cập nhật...";
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
        $category = $this->categoryRepo->findById($id);
        return \auto_redirect(\view("pages.super.category.edit", ['category' => $category, 'title' => $this->title]), "ajax");
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
        $request->validate(['link_name' => "required"],[]);
        try {
            $this->categoryRepo->updateById($id, ["link_name" => $request->link_name]);
            return redirect("/category")->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
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
        try {
            $this->categoryRepo->deleteById($id);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
