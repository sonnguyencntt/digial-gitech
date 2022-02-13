<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\internet\InternetRepositoryInterface;
use App\Repositories\category\CategoryRepositoryInterface;
class ServiceInternetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title;
    public function __construct(InternetRepositoryInterface $internetRepo,CategoryRepositoryInterface $cateogryRepo)
    {
        $this->internetRepo = $internetRepo;
        $this->categoryRepo=$cateogryRepo;
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
    public function show($store_code)
    
    {   
        $internetRepo=$this->internetRepo->getAll($store_code);
        $findidcategory=$this->categoryRepo->getAll($store_code);
        
        
        return view("pages.service_internet.index",['list_internet' => $internetRepo ,'getCategory'=>$findidcategory,'title'=>$findidcategory[0]->name,'status'=>201]);
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
