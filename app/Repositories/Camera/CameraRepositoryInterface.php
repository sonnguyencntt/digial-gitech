<?php
namespace App\Repositories\Camera;

use App\Repositories\RepositoryInterface;

interface CameraRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getAll();
    public function getID($id);
    public function getFirstID($store_code);
    public function getSecondID($store_code);
    public function getCategoryName($store_code);
    public function createMultiRecord($arr);
}