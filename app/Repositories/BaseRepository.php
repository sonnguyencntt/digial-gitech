<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }



    // Set data contain store_code

    public function findByStore($id, $store_code)
    {
        $result = $this->model->where("store_code",  $store_code)->find($id);

        return $result;
    }
    public function updateByStore($id, $store_code, $attributes = [])
    {
        $result = $this->findByStore($id, $store_code);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
    public function deleteByStore($id, $store_code)
    {
        $result = $this->findByStore($id, $store_code);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function firstByStore($store_code)
    {
        return $this->model->where("store_code",  $store_code)->first();
    }


    // close








    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function updateById($id, $attributes = [])
    {
        $result = $this->findById($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }


    public function deleteById($id)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function count()
    {
        return $this->model->count();
    }
    public function first()
    {
        return $this->model->first();
    }
    public function all()
    {
        return $this->model->all();
    }
    public function insert($data = [])
    {
        return $this->model->insert($data);
    }
    public function createMultiRecord($data = [])
    {
        if ($data and count($data) > 0) {
            foreach ($data as $key => $row) {
                 $this->model->create($row);
            }
        }
    }
    public function upsert($data = [])
    {
        return $this->model->upsert($data);
    }

    public function getOriginalImageUrl()
    {
        
    }
    public function setImageAttrOgrinal()
    {
         $this->model->overrideImageAttr = "ogrinal";
    }
}
