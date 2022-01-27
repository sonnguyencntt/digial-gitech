<?php
namespace App\Repositories\Play;

use App\Repositories\BaseRepository;

class PlayRepository extends BaseRepository implements PlayRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\FptPlay::class;
    }

    public function all()
    {
        return $this->model->with('category')->get();
    }
    public function getAllPlay($id){
        $results = $this->model->with('category')->where('category_id' ,'=' ,$id)->get();
        return $results;
    }
}