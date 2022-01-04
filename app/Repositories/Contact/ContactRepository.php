<?php
namespace App\Repositories\Contact;

use App\Repositories\BaseRepository;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Contact::class;
    }

    public function getProduct()
    {
        return $this->model->select('name_category')->take(5)->get();
    }
    public function getID($id){
        return $this->model->find($id);
    }
}