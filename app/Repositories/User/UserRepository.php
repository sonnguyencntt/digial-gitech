<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\User::class;
    }

    public function getProduct()
    {
        return $this->model->select('name_category')->take(5)->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}