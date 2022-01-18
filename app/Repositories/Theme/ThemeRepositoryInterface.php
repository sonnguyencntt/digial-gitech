<?php
namespace App\Repositories\Theme;

use App\Repositories\RepositoryInterface;

interface ThemeRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
    public function getID($id);
}