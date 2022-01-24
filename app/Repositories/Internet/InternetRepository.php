<?php

namespace App\Repositories\Internet;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Category;

class InternetRepository extends BaseRepository implements InternetRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Internet::class;
    }

    public function getAll($store_code = null)
    {
        return $this->model->with("store", "category")->where("store_code", $store_code)->get();
    }
    public function count($store_code = null)
    {
        return $this->model->with("store")->where("store_code" , $store_code )->count();
    }

    public function getAllInternet($id)
    {
        $results = $this->model->with("store")->where('category_id', '=', $id)->get();
        return $results;
    }
    public function getCategoryName($id)
    {
        $results = $this->model->with('store.category.internet')->where('id', '=', $id)->get();
        return $results;
    }
 
}
