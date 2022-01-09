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

    public function all()
    {
        return $this->model->with('category')->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}