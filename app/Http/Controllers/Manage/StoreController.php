<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;

use Auth;
class StoreController extends Controller
{
    protected $title = "Cửa hàng";
    protected $domain_name;
    protected $storeRepo;

    public function __construct(StoreRepositoryInterface $storeRepo )
    {
        $this->storeRepo = $storeRepo;
        $this->domain_name = \config("app.short_url");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view("pages.admin.store.create" , ['title' => $this->title , 'domain_name' => $this->domain_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoreRequest $request)
    {
        try{
            $this->storeRepo->create([
                "store_code" => $request->store_code,
                "name" => $request->name,
                "address" => $request->address,
                "status" => "WAITING",
                "user_id" => Auth::user()->id
            ]);
            return redirect()->route("manage.home.show_stores")->with(["status"=> 201 , "status_code" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
        }
        catch(\throwable $err){
            \dd($err);
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
        $store = $this->storeRepo->findById($id);

        return \view("pages.admin.store.edit" , ['store'=>$store , 'title' => $this->title , "domain_name"=>$this->domain_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, $id)
    {
        try{
            $this->storeRepo->updateById($id , [
                "name" => $request->name,
                "address" => $request->address,
            ]);
            return redirect()->route("manage.home.show_stores")->with(["status"=> 201 , "status_code" => "success",  "msg"=>"Cập nhật dữ liệu thành công"]);
        }
        catch(\throwable $err){
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
        //
    }
}
