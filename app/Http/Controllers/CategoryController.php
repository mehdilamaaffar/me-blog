<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $catRepo) {
        $this->catRepo = $catRepo;
    }

    public function posts($id)
    {
        $posts = $this->catRepo->getLatestCategoryPosts($id);

        return view('category-posts', compact('posts'));
    }
}
