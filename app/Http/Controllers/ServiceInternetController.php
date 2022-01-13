<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\internet\InternetRepositoryInterface;
class ServiceInternetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title;
    public function __construct(InternetRepositoryInterface $getInternet)
    {
        $this->getInternet = $getInternet;
    }
    public function index()
    {
        return view("pages.service_internet.index");
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
        $list_internet=$this->getInternet->getAllInternet($id);
        $getCategoryName=$this->getInternet->getCategoryName($id);
        $title=$getCategoryName[0]->name;
        
        return view("pages.service_internet.index",['list_internet' => $list_internet ,'title'=>$title,'status'=>201]);
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
