<?php
namespace App\Repositories\ScreenInternet;

use App\Repositories\BaseRepository;

class ScreenInternetRepository extends BaseRepository implements ScreenInternetRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\ScreenInternet::class;
    }

    public function all()
    {
        return $this->model->with('category')->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}