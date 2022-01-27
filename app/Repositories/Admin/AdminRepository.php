<?php
namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Admin::class;
    }

    public function getProduct()
    {
        return $this->model->select('name_category')->take(5)->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
    public function countByStatus($status)
    {
        return $this->model->where("status" , $status ?? 0)->count();
    }
}