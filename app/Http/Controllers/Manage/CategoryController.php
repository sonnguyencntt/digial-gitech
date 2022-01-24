<?php

namespace App\Http\Controllers\Manage;
use App\Category;
use Illuminate\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Service\CategoryService;
use App\Exceptions\Category\CategoryException;
class CategoryController extends Controller
{
    protected $categoryRepo;
    protected $title = "Danh mục";
    
    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {
        $listCategories = $this->categoryRepo->getAll($store_code);
        return \view("pages.admin.category.index" , ["store_code"=>$store_code , 'listCategories' => $listCategories , 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {   
        // $linkUrl="/service";
        // $link_url=$linkUrl."/".$request->link_url;

        // try{
        //     if($request->has('image_url')){
        //         $file=$request->image_url;
        //         $etx=$request->image_url->extension();
        //         $file_name=time().'-'.'category.'.$etx;
        //         $file->move(public_path('images\category'),$file_name);
        //     }

        //     $category=Category::create([
        //         'name'=>$request->name,
        //         'image_url'=>$file_name,
        //         'details'=>$request->details,
        //         'advantage'=>$request->advantage,
        //         'link_url'=>$link_url,
        //     ]);
        //     Session()->flash('success','thêm danh mục thành công ');
        //     return redirect()->back();
         
        // }

        // catch(\throwable $err){
            
        //     Session()->flash('error','thêm danh mục thất bại ');
        //     return redirect()->back();
         

        // }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // try {
        //     $user = CategoryService::search($id);
        //     $showCategory = $this->categoryRepo->getID($id);
        //     return response()->json($showCategory);
        // } catch (CategoryException $exception) {
        //     throw $exception;
        // }
        // return redirect()->back();
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($store_code , $id)
    {
        $category = $this->categoryRepo->findByStore($id , $store_code);
        return \view("pages.admin.category.edit" , ["store_code"=>$store_code , 'category'=>$category , 'title' => $this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoryRequest $request, $store_code , $id)
    {   
        try{
            $this->categoryRepo->updateByStore($id , $store_code , [
                "name" => $request->name,
            ]);
            return redirect()->route("manage.category.index" , $store_code)->with(["status"=> 201 , "status_code" => "success",  "msg"=>"Cập nhật dữ liệu thành công"]);
        }
        catch(\throwable $err){
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
        // $image=$request->input('image_url');
        // $name=$request->input('name');
        // $details=$request->input('details');
        // $advantage=$request->input('advantage');
        // $linkurl=$request->input('link_url');
        // $linkUrl="/service";
        // $link_url=$linkUrl."/".$linkurl;
        // if($request->hasFile('image_url')){
            
        //     try{
        //     $delete='public/images/category/'.$updateCategory->image;
        //     if(file_exists($delete)){
        //         unlink($delete);
        //     };
        //     $file=$request->input('image');
        //     $etx=$request->image->extension();
        //     $file_name=time().'-'.'category.'.$etx;
        //     $file->move(public_path('images\category'),$file_name);
        //     $name=$request->input('name');
        //     $details=$request->input('details');
        //     $advantage=$request->input('advantage');
        //     $linkurl=$request->input('link_url');
        //     $linkUrl="/service";
        //     $link_url=$linkUrl."/".$linkurl;

        //     $updateCategory = $this->categoryRepo->getID($id);
        //     $update = Category::where('id', $id)
        //             ->update([
        //                 'name' => $name,
        //                 'image_url' => $file_name,
        //                 'details'=>$details,
        //                 'advantage'=>$advantage,
        //                 'link_url'=>$link_url
        //             ]);
        //     return "thanh cong";
        //     }
        //     catch(\throwable $err){
        //         return "that bai";
        //     }
        // }
        // else{
        //     try{
              
        //         $updateCategory = $this->categoryRepo->getID($id);
        //         $updateCategory->name=$name;
        //         $updateCategory->details=$details;
        //         $updateCategory->advantage=$advantage;
        //         $updateCategory->link_url=$link_url;
        //         $updateCategory->save();
        //         return "thanhf coong";
        //     }
        //     catch(\throwable $err){
        //         return "that bai";
        //     }
            
        // }
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try{
        //     $updateCategory = $this->categoryRepo->getID($id);
            
        //     $delete='public/images/category/'.$updateCategory->image;
            
        //     if(file_exists($delete)){
        //         unlink($delete);
        //     };
        //     $updateCategory->delete();
        //     return "thanh cong";
        
            
        // }
        // catch(\throwable $th){
        //     Session()->flash('error','xóa danh mục thất bại');
        //     return "that bai";
        // }
    }
}
