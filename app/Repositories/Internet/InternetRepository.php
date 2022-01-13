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

    public function all()
    {
        return $this->model->with('category')->get();
    }
    
    public function getAllInternet($id){
        $results = $this->model->where('category_id', '=',$id)->get();
        return $results;
    }
    public function getCategoryName($id){
        $results = $this->model->with('category.internet')->where('id', '=',$id)->get();
        return $results;
    }
}