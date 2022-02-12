<?php

namespace App\Repositories\Internet;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Category;
use Log;
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

    
    public function getAllInternet($id){
        $results = $this->model->with('category')->where('category_id' ,'=' ,$id)->get();
        return $results;
    }
    public function getCategoryName($id){
        
        $results = $this->model->with('category')->find( $id);
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
                $this->model->create($row);
            }
        }
    }
}
