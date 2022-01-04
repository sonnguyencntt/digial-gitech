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

    public function all()
    {
        return $this->model->with('internet.category')->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
    
}