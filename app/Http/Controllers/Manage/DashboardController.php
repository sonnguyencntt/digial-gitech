<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
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
    protected $customerRepo;
    protected $orderRepo;


    protected $title = "Bảng điều khiển";


    public function __construct(customerRepositoryInterface $customerRepo , PostsRepositoryInterface $postsRepo , OrderRepositoryInterface $orderRepo)
    {
        $this->customerRepo = $customerRepo;
        $this->postsRepo = $postsRepo;
        $this->orderRepo = $orderRepo;


    }

    public function index()
    {
        $countCustomer = $this->customerRepo->count();
        $countPosts = $this->postsRepo->count();
        $countOrder = $this->orderRepo->count();

        return \auto_redirect(\view("pages.admin.dashboard.index" , ["countCustomer"=> $countCustomer , "countPosts" => $countPosts , "countOrder" => $countOrder ,  "title" => $this->title]) , "ajax");

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
