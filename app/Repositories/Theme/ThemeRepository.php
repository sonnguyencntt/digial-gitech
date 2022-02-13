<?php
namespace App\Repositories\Theme;

use App\Repositories\BaseRepository;

class ThemeRepository extends BaseRepository implements ThemeRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Theme::class;
    }

    public function getAll($store_code =null)
    {
        return $this->model->with("store")->where("store_code" , $store_code)->get();
    }
    public function getByStore($store_code){
        return $this->model->where("store_code",$store_code)->first();
    }
    public function getID($id){
        return $this->model->with("store")->find($id);
    }
    public function setLogoAttrOgrinal()
    {
        return $this->model->overrideLogoAttr = "ogrinal";
    }
}