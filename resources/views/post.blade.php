@extends('layouts.app')

@section('content')

<article class="-mt-10 bg-white mb-16 border-grey-lighter shadow border-2 relative p-8" id="post">
    <time datetime="{{ $post->created_at->toDateTimeString() }}" class="text-sm text-grey">
        {{ $post->created_at->diffForHumans() }}
    </time>
    <a class="block text-2xl text-grey-darkest pb-1 no-underline" href="{{ route('single.post.show', $post->slug) }}">{{ $post->title }}</a>
    <div class="text-base text-grey-darker pb-2">{!! nl2br(e($post->content)) !!}</div>
</article>

@endsection
