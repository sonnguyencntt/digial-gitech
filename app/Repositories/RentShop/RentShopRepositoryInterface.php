<?php
namespace App\Repositories\RentShop;

use App\Repositories\RepositoryInterface;

interface RentShopRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getID($id);
    public function distinct();
}