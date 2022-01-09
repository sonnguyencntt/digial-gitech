<?php
namespace App\Repositories\Internet;

use App\Repositories\RepositoryInterface;

interface InternetRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function all();
    public function getID($id);
}