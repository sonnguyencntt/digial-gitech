<?php
namespace App\Repositories\RentShop;

use App\Repositories\BaseRepository;

class RentShopRepository extends BaseRepository implements RentShopRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\RentShop::class;
    }

  
    public function getID($id){
    }
    public function getAll($store_code=null)
    {
        return $this->model->get();
    }
  

    public function distinct($store_code = null)
    {
    }
}