<?php

namespace App\Repositories;

use App\Post;
use App\Repositories\BaseRepository;

class PostRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Post $model) {
        $this->model = $model;
    }

    public function getPost($postId)
    {
        return $this->model->with('category')->find($postId);
    }

    public function getLatestPosts($items = 5)
    {
        return $this->model
                    ->with('category')
                    ->latest()
                    ->paginate($items);
    }

    public function getPostBySlug($slug)
    {
        return $this->model
                    ->with('category')
                    ->where('slug', $slug)
                    ->first();
    }

    /**
     * Search the posts by keywords.
     *
     * @param string $key
     * @return Collection
     */
    public function search()
    {
        $key = trim(request('keyword'));

        return $this->model
                    ->where('title', 'like', "%{$key}%")
                    ->orderBy('published_at', 'desc')
                    ->get();
    }
}
