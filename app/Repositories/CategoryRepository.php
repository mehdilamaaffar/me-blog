<?php

namespace App\Repositories;

use App\Category;
use App\Repositories\BaseRepository;

class CategoryRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Category $model) {
        $this->model = $model;
    }

    public function getCategory($CategoryId)
    {
        return $this->model->find($CategoryId);
    }

    public function getLatestCategories($items = 5)
    {
        return $this->model
                    ->latest()
                    ->paginate($items);
    }

    public function getLatestCategoryPosts($id, $items = 5)
    {
        return $this->model
                    ->find($id)
                    ->posts()
                    ->latest()
                    ->paginate($items);
    }
}
