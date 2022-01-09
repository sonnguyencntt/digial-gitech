<?php
namespace App\Repositories\Camera;

use App\Repositories\BaseRepository;

class CameraRepository extends BaseRepository implements CameraRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Camera::class;
    }

    public function all()
    {
        return $this->model->with('category')->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}