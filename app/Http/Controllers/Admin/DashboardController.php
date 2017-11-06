<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class DashboardController extends Controller
{
    public function index(PostRepository $postRepo)
    {
        $posts = $postRepo->paginate();

        return view('admin.index', compact('posts'));
    }
}
