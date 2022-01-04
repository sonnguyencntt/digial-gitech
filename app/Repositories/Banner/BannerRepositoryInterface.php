<?php
namespace App\Repositories\Banner;

use App\Repositories\RepositoryInterface;

interface BannerRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
    public function getID($id);
}