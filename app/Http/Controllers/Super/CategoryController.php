<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Http\Requests\category\CreateCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $categoryRepo;
    protected $storeRepo;

    protected $title = "Danh mục";

    public function __construct(categoryRepositoryInterface $categoryRepo , StoreRepositoryInterface $storeRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->storeRepo = $storeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = $this->categoryRepo->all();
        return \view("pages.super.category.index" , [ 'listCategories' => $listCategories , 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listStores = $this->storeRepo->all();

        return \view("pages.super.category.create" , ['listStores' =>$listStores  , 'title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try{
        
            $this->categoryRepo->create($request->all());
            return redirect()->route("super.category.index")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
         $listStores = $this->storeRepo->all();

        $category = $this->categoryRepo->findById($id);
        return \view("pages.super.category.edit", ['listStores' =>$listStores , 'category' => $category, 'title' => $this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $this->categoryRepo->updateById($id, $request->all());
            return redirect()->route("super.category.index")->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
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
