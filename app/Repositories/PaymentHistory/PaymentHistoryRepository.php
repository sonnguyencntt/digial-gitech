<?php
namespace App\Repositories\PaymentHistory;

use App\Repositories\BaseRepository;

class PaymentHistoryRepository extends BaseRepository implements PaymentHistoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\PaymentHistory::class;
    }
    public function getAll($store_code =null)
    {
        return $this->model->with("store")->with("internet.category")->where("store_code" , $store_code)->get();
    }

    public function getID($id){
        return $this->model->with("store")->find($id);
    }
    public function count($store_code=null)
    {
        return $this->model->with("store")->where("store_code" , $store_code )->count();
    }
   
    
}