<?php
namespace App\Repositories\Internet;

use App\Repositories\BaseRepository;

class InternetRepository extends BaseRepository implements InternetRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Internet::class;
    }

    public function all()
    {
        return $this->model->with('category')->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}