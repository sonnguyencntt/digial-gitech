<?php
namespace App\Repositories\Store;

use App\Repositories\BaseRepository;
class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{
    public function getModel()
    {
        return \App\Store::class;
    }

    public function getFristOrderById($id)
    {
       return $this->model->with("user")->where("user_id" , $id)->orderBy('id', 'DESC')->first();
    }
    public function countForStatus($status_code , $user_id=null)
    {
       return $this->model->with("user")->where("status" , $status_code)->where("user_id" , $user_id)->count();

    }

    public function findByStoreCode($store_code = null)
    {
        return $this->model->where("store_code", $store_code)->first();

    }
    public function getAll($user = null)
    {
        return $this->model->with("user" , "theme")->where("user_id", $user)->get();
    }
    public function countByStatus($status)
    {
        return $this->model->where("status" , $status)->count();
    }
    public function getWithUser(){
        return $this->model->with("user")->get();

    }
    public function updateStatus($id ,$status){
        
    }
}