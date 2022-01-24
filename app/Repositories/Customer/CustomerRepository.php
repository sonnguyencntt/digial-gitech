<?php
namespace App\Repositories\Customer;

use App\Repositories\BaseRepository;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function getModel()
    {
        return \App\Customer::class;
    }

    public function count($store_code = null)
    {
        return $this->model->with("store")->where("store_code" , $store_code )->count();
    }
    public function getAll($store_code =null)
    {
        return $this->model->with("store")->where("store_code" , $store_code)->get();
    }
    
}