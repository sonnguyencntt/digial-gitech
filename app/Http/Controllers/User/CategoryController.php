<?php

namespace App\Http\Controllers\User;
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
    protected $linkFolder = "/images/category";
    
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
        return \view("pages.user.category.index" , [ 'listCategories' => $listCategories , 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return \view("pages.user.category.create" , [ 'title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request , $store_code)
    {
        $fileName = null;

        try{
                if($request->has('image')){
                    $file=$request->image;
                    $etx=$request->image->extension();
                    $fileName=time().'-'.'category.'.$etx;
                    $file->move(public_path($this->linkFolder),$fileName);
                }
      
        
            $this->categoryRepo->create(\array_merge($request->all() ,["store_code" => $store_code , 'image_url'=>$fileName] ));
            return redirect()->route("user.category.index" , $store_code)->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
        return \view("pages.user.category.edit" , [ 'category'=>$category , 'title' => $this->title]);
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

        $fileName = null;
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $fileName=time().'-'.'category.'.$etx;
                $file->move(public_path($this->linkFolder),$fileName);
            }

            if($fileName == null)
            {
                $this->categoryRepo->updateByStore($id,$store_code,$request->all());
                try {

                } catch (\Throwable $th) {
                    return redirect()->route("user.category.index" , $store_code)->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Cập dữ không liệu thành công"]);
                }
            }
            else
            {
                try {
                    $this->categoryRepo->updateByStore($id,$store_code,[
                        'name'=>$request->name,
                
                        'image_url'=>$fileName,
    
                    ]);
                    $file_path = public_path($request->image_url_string);
                    if (File::exists($file_path))
                        File::delete($file_path);             
                 } catch (\Throwable $th) {
                    //throw $th;
                }
           
            }


            return redirect()->route("user.category.index" , $store_code)->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Cập nhật dữ liệu thành công"]);
        }

        catch(\throwable $err){
            \dd($err);
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }

        // try{
        //     $this->categoryRepo->updateByStore($id , $store_code , [
        //         "name" => $request->name,
        //     ]);
        //     return redirect()->route("user.category.index" , $store_code)->with(["status"=> 201 , "status_code" => "success",  "msg"=>"Cập nhật dữ liệu thành công"]);
        // }
        // catch(\throwable $err){
        //     return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        // }
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
    public function destroy($store_code , $id)
    {
        try {
             $this->categoryRepo->deleteByStore($id,$store_code);
            return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
        }

    }
}
