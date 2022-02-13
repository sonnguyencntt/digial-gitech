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
    public function count($store_code = null)
    {
        return $this->model->with("store")->where("store_code" , $store_code )->count();
    }
    public function getAll($store_code = null)
    {
        return $this->model->with('store','category')->where("store_code" , $store_code)->get();
    }
    public function getID($id){
        return $this->model->with("store")->find($id);
    }
    public function getFirstID(){
        return $this->model->with("store")->first();
    }
    public function getSecondID(){
        $getFistID=$this->getFirstID();

        return $this->model->with("store")->find( $getFistID->id+1);
    }
    public function getCategoryName(){
        $getFistID=$this->getFirstID();
        $results = $this->model->with('store','category')->find( $getFistID->id);
        return $results;
    }
}