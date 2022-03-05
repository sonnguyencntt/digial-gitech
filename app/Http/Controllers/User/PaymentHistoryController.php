<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PaymentHistory\PaymentHistoryRepositoryInterface;

class PaymentHistoryController extends Controller
{
    protected $paymentRepo;
    protected $storeRepo;

    protected $title = "Lịch sử thanh toán";

    public function __construct(PaymentHistoryRepositoryInterface $paymentRepo )
    {
        $this->paymentRepo = $paymentRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {
        $listPaymentHistories = $this->paymentRepo->getByStore($store_code);
        return \view("pages.user.payment_history.index" , [ 'listPaymentHistories' => $listPaymentHistories , 'title' => $this->title]);
    }

}
