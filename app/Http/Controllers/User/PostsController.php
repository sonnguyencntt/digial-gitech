<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostsRepositoryInterface;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use App\Http\Resources\PostsResource;
use File;
class PostsController extends Controller
{


    protected $postsRepo;
    protected $title = "Bài viết";
    protected $linkFolder = "/images/posts";

    public function __construct(PostsRepositoryInterface $postsRepo)
    {
        $this->postsRepo = $postsRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {
        $listPosts = $this->postsRepo->getAll($store_code);
        return \view("pages.user.posts.index" , ['listPosts' => $listPosts , 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($store_code)
    {
        return \view("pages.user.posts.create" , [ 'title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request ,$store_code)
    {
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $fileName=time().'-'.'posts.'.$etx;
                $file->move(public_path($this->linkFolder),$fileName);
            }
            $this->postsRepo->create([
                'title'=>$request->title,
                'status'=>$request->status,
                'description'=>$request->description,
                'store_code' => $request->store_code,
                'image_url'=>$fileName,
            ]);
            return redirect()->route("user.posts.index" , $store_code)->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
        $posts = $this->postsRepo->findByStore($id , $store_code);
        return \view("pages.user.posts.edit" , ["store_code"=> $store_code ,'posts'=>$posts , 'title' => $this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, $store_code , $id)
    {
        $fileName = null;
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $fileName=time().'-'.'posts.'.$etx;
                $file->move(public_path($this->linkFolder),$fileName);
            }

            if($fileName == null)
            {
                
                $this->postsRepo->updateByStore($id,$store_code,[
                    'title'=>$request->title,
                    'status'=>$request->status,
                    'description'=>$request->description,
                ]);
                try {

                } catch (\Throwable $th) {
                    return redirect()->route("user.posts.index" , $store_code)->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Cập dữ không liệu thành công"]);
                }
            }
            else
            {
                try {
                    $this->postsRepo->updateByStore($id,$store_code,[
                        'title'=>$request->title,
                        'status'=>$request->status,
                        'description'=>$request->description,
                        'image_url'=>$fileName,
    
                    ]);
                    $file_path = public_path($request->image_url_string);
                    if (File::exists($file_path))
                        File::delete($file_path);             
                 } catch (\Throwable $th) {
                    //throw $th;
                }
           
            }


            return redirect()->route("user.posts.index" , $store_code)->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Cập nhật dữ liệu thành công"]);
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
    public function destroy($store_code , $id)
    {
        try {
             $this->postsRepo->deleteByStore($id,$store_code);
            return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
        }

    }
}
