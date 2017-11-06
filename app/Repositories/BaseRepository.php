<?php

namespace App\Repositories;

trait BaseRepository
{
    protected $orderByColumn = "created_at";
    protected $orderByDirection = "desc";

    public function all()
    {
        return $this->model
                    ->orderBy($this->orderByColumn, $this->orderByDirection)
                    ->get();
    }

    public function findById($condition)
    {
        return $this->model
            ->where(['id' => $condition])
            ->orderBy($this->orderByColumn, $this->orderByDirection)
            ->first();
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function softDeletes($id)
    {
        return $this->model->Softdeletes($id);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function paginate($items = 10)
    {
        return $this->model
                    ->orderBy($this->orderByColumn, $this->orderByDirection)
                    ->paginate($items);
    }

    public function getModel()
    {
        return $this->model;
    }
}
