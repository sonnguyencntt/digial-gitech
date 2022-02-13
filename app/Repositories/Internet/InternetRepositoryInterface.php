<?php
namespace App\Repositories\Internet;

use App\Repositories\RepositoryInterface;

interface InternetRepositoryInterface extends RepositoryInterface
{

    public function getAllInternet($id);
    public function getCategoryName($id);
    public function all();
    public function getDetail($store_code,$id);
}