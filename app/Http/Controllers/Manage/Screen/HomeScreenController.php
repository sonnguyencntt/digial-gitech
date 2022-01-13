<?php

namespace App\Http\Controllers\Manage\Screen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeScreenController extends Controller
{
    protected $screenHomeRepo;
    protected $title = "Màn hình Trang chủ";
    protected $linkFolder = "/images/screen_home";

    public function __construct(ScreenHomeRepositoryInterface $screenHomeRepo)
    {
        $this->screenHomeRepo = $screenHomeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listScreenHome = $this->screenHomeRepo->getAll();
        return \auto_redirect(\view("pages.admin.screen_home.index" , ['listScreenHome' => $listScreenHome , 'title' => $this->title]) ,  $listScreenHome);
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
