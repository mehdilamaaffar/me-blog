<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;

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

    public function search($key)
    {
        $posts = $this->post->search($key);

        return view('search', compact('posts'));
    }
}
