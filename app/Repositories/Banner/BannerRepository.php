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

    public function getProduct()
    {
        return $this->model->select('name_category')->take(5)->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}