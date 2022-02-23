<?php
namespace App\Repositories\Play;

use App\Repositories\RepositoryInterface;

interface PlayRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getID($id);
    public function all();
    public function getAllPlay($store_code,$id);
}