<?php
namespace App\Repositories\Play;

use App\Repositories\BaseRepository;

class PlayRepository extends BaseRepository implements PlayRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\FptPlay::class;
    }

    public function count($store_code = null)
    {
        return $this->model->with("store")->where("store_code" , $store_code )->count();
    }
    public function getAll($store_code =null)
    {
        return $this->model->with("store", "category")->where("store_code", $store_code)->get();
    }
    public function getID($id , $store_code=null){
        return $this->model->with("store")->where("store_code" , $store_code)->find($id);
    }
}