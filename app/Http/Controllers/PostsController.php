<?php

namespace App\Http\Controllers;
use App\Repositories\Posts\PostsRepositoryInterface;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $postsRepo;


    public function __construct(PostsRepositoryInterface $postsRepo)
    {
        $this->postsRepo = $postsRepo;
    }
    public function index(Request $request , $domain)
    {   
        $store_code = $request->store_code;
        $list_posts=$this->postsRepo->getAll($store_code);
        
        return view("pages.posts.index" , ['list' => $list_posts,'status'=>201]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Request $request , $domain,$post_id)
    {   
        $store_code = $request->store_code;

        $detailPosts=$this->postsRepo->findById($post_id);
        $listPosts=$this->postsRepo->getPostNew($store_code);
        return view("pages.posts.detail",['detail'=>$detailPosts,'listPosts'=>$listPosts,'status'=>201] );
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
