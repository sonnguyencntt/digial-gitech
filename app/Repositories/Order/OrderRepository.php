<?php
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Order::class;
    }
    public function getAll($store_code =null)
    {
        return $this->model->with("store.internet.category")->where("store_code" , $store_code)->get();
    }

    public function getID($id){
        return $this->model->with("store")->find($id);
    }
    public function count($store_code=null)
    {
        return $this->model->with("store")->where("store_code" , $store_code )->count();
    }
   
    
}