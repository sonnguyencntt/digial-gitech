<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\category\CategoryRepositoryInterface;
use App\Repositories\play\PlayRepositoryInterface;
class ServicePlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(PlayRepositoryInterface $playRepo,CategoryRepositoryInterface $cateogryRepo)
    {
        $this->playRepo = $playRepo;
        $this->categoryRepo=$cateogryRepo;
    }
    public function index()
    {
        return \auto_redirect(\view("pages.service_play.index") , "ajax");

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
    public function show(Request $request , $domain,$id)
    {
        $store_code = $request->store_code;

        $listPlay=$this->playRepo->getAllPlay($store_code,$id);
        return view("pages.service_play.index",['listPlay'=>$listPlay,'status'=>201] );
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
