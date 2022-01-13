<?php
namespace App\Repositories\ScreenInternet;

use App\Repositories\RepositoryInterface;

interface ScreenInternetRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function all();
    public function getID($id);
}