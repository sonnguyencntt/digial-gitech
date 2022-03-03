<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PaymentHistory\PaymentHistoryRepositoryInterface;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Http\Requests\PaymentHistory\CreatePaymentHistoryRequest;
use App\Http\Requests\PaymentHistory\UpdatePaymentHistoryRequest;

class PaymentHistoryController extends Controller
{
    protected $paymentRepo;
    protected $storeRepo;

    protected $title = "Lịch sử thanh toán";

    public function __construct(PaymentHistoryRepositoryInterface $paymentRepo , StoreRepositoryInterface $storeRepo)
    {
        $this->paymentRepo = $paymentRepo;
        $this->storeRepo = $storeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPaymentHistories = $this->paymentRepo->all();
        return \view("pages.admin.payment_history.index" , [ 'listPaymentHistories' => $listPaymentHistories , 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listStores = $this->storeRepo->all();

        return \view("pages.admin.payment_history.create" , ['listStores' =>$listStores  , 'title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaymentHistoryRequest $request)
    {

        try{
        
            $this->paymentRepo->create(array_merge($request->all() , ["order_code"=>\Str::random(12)]));
            return redirect()->route("admin.payment_history.index")->with(["status"=> 201 , "alert" => "success",  "msg"=>"Thêm dữ liệu thành công"]);
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
         $listStores = $this->storeRepo->all();

        $paymentHistory = $this->paymentRepo->findById($id);
        return \view("pages.admin.payment_history.edit", ['listStores' =>$listStores , 'paymentHistory' => $paymentHistory, 'title' => $this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentHistoryRequest $request, $id)
    {
        try {
            $this->paymentRepo->updateById($id, $request->all());
            return redirect()->route("admin.payment_history.index")->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
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
        try {
            $this->paymentRepo->deleteById($id);
           return redirect()->back()->with(["status"=> 204 , "alert" => "success" ,  "msg"=>"Xóa dữ liệu thành công"]);

       } catch (\Throwable $th) {
           throw $th;
           return redirect()->back()->with(["status"=> 400 , "alert" => "danger" ,  "msg"=>"Xóa dữ liệu không thành công"]);
       }
    }
}
