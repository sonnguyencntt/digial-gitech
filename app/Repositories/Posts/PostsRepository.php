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

    public function getAll($store_code =null)
    {
        return $this->model->with("store")->where("store_code" , $store_code)->get();
    }
    public function getID($id){
        return $this->model->with("store")->find($id);
    }
    public function count($store_code=null)
    {
        return $this->model->with("store")->where("store_code" , $store_code )->count();
    }
   
    public function getThreePosts(){
        return $this->model->take(3)->get();
    }
}