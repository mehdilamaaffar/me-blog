<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct(PostRepository $postRepo) {
        $this->postRepo = $postRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepo->getLatestPosts();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check if the user provide a new category.
        if (! is_null($request->category_name) || is_null($request->category_id)) {
            $categoryId = Category::firstOrCreate(['name' => $request->category_name])->id;
            $request->merge(['category_id' => $categoryId]);
        }

        return $request;

        $validatedRequest = $request->validate([
            "title"             => 'required|unique:posts|min:10|max:100|string|unique:posts,slug',
            "category_id"       => 'required|integer',
            "slug"              => 'required|min:10|max:100|string|unique:posts,slug',
            "content"           => 'required|min:10|max:10000|string',
            "meta_description"  => 'min:10|max:500|string',
            "is_draft"          => 'required|boolean',
        ]);

        $data = array_merge($validatedRequest, [
            'user_id'   => Auth::user()->id,
            'slug'      => str_slug($validatedRequest['title'])
        ]);

        $this->postRepo->create($data);

        return redirect()
               ->back()
               ->withSuccess('The post inserted successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postRepo->findById($id);
        $categories = Category::all();

        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->postRepo->update($id);

        return redirect()
               ->back()
               ->withSuccess('The post has been updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepo->delete($id);

        return redirect()
               ->back()
               ->withSuccess('The post has been deleted successfuly!');
    }
}
