<?php
namespace App\Repositories\Banner;

use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Banner::class;
    }

    public function getAll($store_code =null)
    {
        return $this->model->with("store")->where("store_code" , $store_code)->get();
    }

    public function getID($id){
        return $this->model->with("store")->find($id);
    }
}