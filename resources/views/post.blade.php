@extends('layouts.app')

@section('content')
<main class="col-md-8">
    <article class="post post-1 bb-n">
        <header class="entry-header">
            <h1 class="entry-title">{{ $post->title }}</h1>
            <div class="entry-meta">
                <span class="post-category"><a href="{{ '/category/' . $post->category->id . '/posts' }}">{{ $post->category->name }}</a></span>
                <span class="post-date">
                    <time class="entry-date" datetime="{{ $post->created_at->toDateTimeString() }}">{{ $post->created_at->diffForHumans() }}</time>
                </span>
                <span class="post-author">{{ $post->author->name }}</span>
            </div>
        </header>
        <div class="entry-content clearfix">
            {{ $post->content }}
        </div>
    </article>
</main>

@include('partials/aside')

@endsection
