<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contact\ContactRepositoryInterface;
use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $postsRepo;
    protected $contactRepo;
    protected $orderRepo;


    protected $title = "Bảng điều khiển";


    public function __construct(contactRepositoryInterface $contactRepo , PostsRepositoryInterface $postsRepo , OrderRepositoryInterface $orderRepo)
    {
        $this->contactRepo = $contactRepo;
        $this->postsRepo = $postsRepo;
        $this->orderRepo = $orderRepo;


    }

    public function index()
    {
        $count_contact = $this->contactRepo->count();
        $count_posts = $this->postsRepo->count();
        $count_order = $this->orderRepo->count();

        return \auto_redirect(\view("pages.admin.dashboard.index" , ["count_contact"=> $count_contact , "count_posts" => $count_posts , "count_order" => $count_order ,  "title" => $this->title]) , "ajax");

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
