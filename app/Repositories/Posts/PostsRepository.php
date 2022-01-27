<?php
namespace App\Repositories\Posts;

use App\Repositories\BaseRepository;

class PostsRepository extends BaseRepository implements PostsRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Posts::class;
    }

    public function getProduct()
    {
        return $this->model->select('name_category')->take(5)->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
    public function getThreePosts(){
        return $this->model->take(3)->get();
    }
}