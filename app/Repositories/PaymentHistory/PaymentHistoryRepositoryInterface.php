<?php
namespace App\Repositories\PaymentHistory;

use App\Repositories\RepositoryInterface;

interface PaymentHistoryRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getAll();
    public function getID($id);
}