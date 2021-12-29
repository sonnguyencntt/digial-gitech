<?php

namespace App\Http\Controllers\Manage;
use App\Categori;
use Illuminate\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\CreateCategoryRequest;
use App\Repositories\category\CategoryRepositoryInterface;
use App\Service\CategoryService;
use App\Exceptions\category\CategoryException;
class CategoryController extends Controller
{
    protected $productRepo;
    public function __construct(CategoryRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepo->getID(2);
        return $products;
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
        
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $file_name=time().'-'.'category.'.$etx;
                $file->move(public_path('images\category'),$file_name);
            }
            $category=categori::create([
                'name_category'=>$request->name_category,
                'image'=>$file_name,
            ]);
            Session()->flash('success','thêm danh mục thành công ');
            return redirect()->back();
        }

        catch(\throwable $err){
            
            Session()->flash('error','thêm danh mục thất bại ');
            return redirect()->back();

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
        //     $showCategory = $this->productRepo->getID($id);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoryRequest $request, $id)
    {   
        $image=$request->input('image');
        $nameCategory=$request->input('name_category');
        if($request->hasFile('image')){
            
            try{
            $delete='public/images/category/'.$updateCategory->image;
            if(file_exists($delete)){
                unlink($delete);
            };
            $file=$request->input('image');
            $etx=$request->image->extension();
            $file_name=time().'-'.'category.'.$etx;
            $file->move(public_path('images\category'),$file_name);
            $nameCategory=$request->input('name_category');
            $updateCategory = $this->productRepo->getID($id);
            $update = Categori::where('id', $id)
                    ->update([
                        'name_category' => $nameCategory,
                        'image' => $file_name,
                    ]);
            return "thanh cong";
            }
            catch(\throwable $err){
                return "that bai";
            }
        }
        else{
            try{
                $updateCategory = $this->productRepo->getID($id);
                $updateCategory->name_category=$nameCategory;
                $updateCategory->save();
                return "thanhf coong";
            }
            catch(\throwable $err){
                return "that bai";
            }
            
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
        try{
            $updateCategory = $this->productRepo->getID($id);
            
            $delete='public/images/category/'.$updateCategory->image;
            
            if(file_exists($delete)){
                unlink($delete);
            };
            $updateCategory->delete();
            return "thanh cong";
        
            
        }
        catch(\throwable $th){
            Session()->flash('error','xóa danh mục thất bại');
            return "that bai";
        }
    }
}
