<?php

namespace App\Http\Controllers\Manage;

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
    protected $link_folder = "/images/posts";

    public function __construct(PostsRepositoryInterface $postsRepo)
    {
        $this->postsRepo = $postsRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_posts = $this->postsRepo->getAll();
        return \auto_redirect(\view("pages.admin.posts.index" , ['list_posts' => $list_posts , 'title' => $this->title]) ,  PostsResource::collection($list_posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \auto_redirect(\view("pages.admin.posts.create" , ['title' => $this->title]) , "ajax");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $file_name=time().'-'.'posts.'.$etx;
                $file->move(public_path($this->link_folder),$file_name);
            }
            $this->postsRepo->create([
                'title'=>$request->title,
                'status'=>$request->status,
                'description'=>$request->description,

                'image_url'=>$file_name,
            ]);
            return redirect("/posts")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
        $posts = $this->postsRepo->findById($id);
        return \auto_redirect(\view("pages.admin.posts.edit" , ['posts'=>$posts , 'title' => $this->title]) , "ajax");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, $id)
    {
        $file_name = null;
        try{
            if($request->has('image')){
                $file=$request->image;
                $etx=$request->image->extension();
                $file_name=time().'-'.'posts.'.$etx;
                $file->move(public_path($this->link_folder),$file_name);
            }

            if($file_name == null)
            {
                $this->postsRepo->updateById($id,[
                    'title'=>$request->title,
                    'status'=>$request->status,
                    'description'=>$request->description,
                ]);
                try {
                    $file_path = $this->link_folder . $request->image_url_string;
                    if(File::exists($file_path)) 
                    File::delete($file_path);
                } catch (\Throwable $th) {
                    return redirect("/posts")->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Cập dữ không liệu thành công"]);
                }
            }
            else
            {
                $this->postsRepo->updateById($id,[
                    'title'=>$request->title,
                    'status'=>$request->status,
                    'description'=>$request->description,
                    'image_url'=>$file_name,

                ]);
            }


            return redirect("/posts")->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Cập nhật dữ liệu thành công"]);
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
    public function destroy($id)
    {
        try {
             $this->postsRepo->deleteById($id);
            return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
        }

    }
}
