<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(PostRepository $postRepo) {
        $this->postRepo = $postRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepo->getLatestPosts();

        return view('home', compact('posts'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->postRepo->getPostBySlug($slug);

        return view('post', compact('post'));
    }

    public function search(Request $request)
    {
        $posts = $this->postRepo->search($request->keyword);

        return view('search', compact('posts'));
    }
}
