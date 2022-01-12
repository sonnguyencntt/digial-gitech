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
    public function getFirstID(){
        return $this->model->get()->first();
    }
    public function getSecondID(){
        $getFistID=$this->getFirstID();

        return $this->model->skip($getFistID->id)->first();
    }
    public function getCategoryName(){
        $getFistID=$this->getFirstID();
        $results = $this->model->with('category')->find( $getFistID->id);
        return $results;
    }
}