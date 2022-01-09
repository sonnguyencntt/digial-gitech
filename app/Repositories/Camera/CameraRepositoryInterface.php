<?php
namespace App\Repositories\Camera;

use App\Repositories\RepositoryInterface;

interface CameraRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function all();
    public function getID($id);
}