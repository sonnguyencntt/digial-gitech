<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Repositories\RentShop\RentShopRepositoryInterface;

use Carbon\Carbon;
use App\Jobs\User\CreateSampleStore;
class StoreController extends Controller
{
    protected $storeRepo;
    protected $rentShopRepo;
    protected $title = "Cửa hàng";
    public function __construct(StoreRepositoryInterface $storeRepo , RentShopRepositoryInterface $rentShopRepo )
    {
        $this->storeRepo = $storeRepo;
        $this->rentShopRepo = $rentShopRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listStores = $this->storeRepo->getWithUser();
        $listRentShops = $this->rentShopRepo->getAll();
        return \view("pages.admin.store.index", [ "listRentShops" => $listRentShops ,  'title' => $this->title, 'listStores' => $listStores, 'title' => $this->title]);
    }

    public function active($id)
    {
        $date_activated = Carbon::now()->toDateTimeString();
        try {
            $result = $this->storeRepo->findById($id);
            if($result)
            {
                $this->storeRepo->updateById($id, ["status" => "WORKING" , "date_activated" => $date_activated]);
                CreateSampleStore::dispatch($result->store_code);
                return redirect()->back()->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
            }
            return redirect()->back()->with(["status" => 204, "alert" => "danger",  "msg" => "ID không tồn tại"]);

        } catch (\throwable $err) {
            \dd($err);
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }
    public function changeRentShop(Request $request , $id)
    {
        try {
            $this->storeRepo->updateById($id, ["rent_shop_id" => $request->rent_shop_id]);
            return redirect()->back()->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }

    public function stop($id)
    {
        try {
            $this->storeRepo->updateById($id, ["status" => "STOP_WORKING"]);
            return redirect()->back()->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activeForPaid($id)
    {
        try {
            $this->storeRepo->updateById($id, ["status" => "WORKING"]);
            return redirect()->back()->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }
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
