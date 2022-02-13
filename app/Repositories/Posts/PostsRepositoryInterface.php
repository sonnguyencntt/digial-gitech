<?php
namespace App\Repositories\Posts;

use App\Repositories\RepositoryInterface;

interface PostsRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getID($id);
    public function getThreePosts();
    public function getPostNew($store_code);
}