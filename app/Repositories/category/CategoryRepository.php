<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Category::class;
    }

  
    public function getID($id){
        return $this->model->with("store")->find($id);
    }
    public function getAll($store_code=null)
    {
        return $this->model->with("store")->where("store_code" , $store_code)->get();
    }

}