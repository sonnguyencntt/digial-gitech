<?php

namespace App\Http\Controllers\Manage\Screen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ScreenInternet\ScreenInternetRepositoryInterface;
class InternetScreenController extends Controller
{
    protected $screenInternetRepo;
    protected $title = "Màn hình Internet";
    protected $linkFolder = "/images/screen_internet";

    public function __construct(ScreenInternetRepositoryInterface $screenInternetRepo)
    {
        $this->screenInternetRepo = $screenInternetRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listScreenInternet = $this->screenInternetRepo->getAll();
        return \auto_redirect(\view("pages.user.screen_internet.index" , ['list_screen_internet' => $listScreenInternet , 'title' => $this->title]) ,  $listScreenInternet);
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
