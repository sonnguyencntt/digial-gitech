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

    public function getProduct()
    {
        return $this->model->select('name_category')->take(5)->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}