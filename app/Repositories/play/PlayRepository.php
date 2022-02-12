<?php

namespace App\Repositories\Play;

use App\Repositories\BaseRepository;
use Log;
use App\Category;
class PlayRepository extends BaseRepository implements PlayRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\FptPlay::class;
    }

    public function count($store_code = null)
    {
        return $this->model->with("store")->where("store_code", $store_code)->count();
    }
    public function getAll($store_code = null)
    {
        return $this->model->with("store", "category")->where("store_code", $store_code)->get();
    }
    public function getID($id, $store_code = null)
    {
        return $this->model->with("store")->where("store_code", $store_code)->find($id);
    }
    public function getAllPlay($id)
    {
        $results = $this->model->with('category')->where('category_id', '=', $id)->get();
        return $results;
    }
    public function createMultiRecord($data = [], $store_code = null)
    {
        if ($data and count($data) > 0) {
            foreach ($data as $key => $row) {
                $category_name = Category::where("id", $row['category_id'])->first();
                if($category_name)
                $category_name = $category_name->name;
                $category_id = Category::where("name", $category_name)->where("store_code", $store_code)->first();
                if($category_id)
                $category_id = $category_id->id;
                Log::channel('jobs')->info($category_id);
                $row['category_id'] = $category_id;
                if($category_id == null or !$category_id)
                break;
                Log::channel('jobs')->info("qua ne2" .$category_id);
                $this->model->create($row);
            }
        }
    }
}
