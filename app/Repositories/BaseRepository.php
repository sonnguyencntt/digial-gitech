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
}
