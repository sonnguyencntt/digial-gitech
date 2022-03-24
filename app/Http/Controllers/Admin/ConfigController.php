<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepositoryInterface;
use App\AdminConfig;
use Cache;
class ConfigController extends Controller
{

    protected $storeRepo;
    protected $title = "Cấu hình";
    public function __construct(StoreRepositoryInterface $storeRepo)
    {
        $this->storeRepo = $storeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $config = AdminConfig::first();
        if($config)
        {
            if (!Cache::has('admin_configs') || !isset(Cache::has('admin_configs')->cron_time_for_order)) {
                Cache::put('admin_configs', $config);
            }
        }
        $listStores = $this->storeRepo->getWithUser();
        return \view("pages.admin.config.index", ["listStores" => $listStores, 'config' => $config, 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = AdminConfig::create([]);
            Cache::put('admin_configs', $data);
            return redirect()->back()->with(["status"=> 201 , "alert" => "success",  "msg"=>"Generate config thành công"]);
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
        try {
            $result = AdminConfig::find($id);
            if ($result) {
                $data = $result->update($request->all());
                Cache::put('admin_configs', AdminConfig::find($id));
            }
            return redirect()->back()->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {

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
