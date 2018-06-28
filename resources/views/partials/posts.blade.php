@foreach ($posts as $post)
    <article class="-mt-10 bg-white mb-16 border-grey-lighter shadow border-2 relative p-8">
        <time datetime="{{ $post->created_at->toDateTimeString() }}" class="text-sm text-grey">
            {{ $post->created_at->diffForHumans() }}
        </time>
        <h1 class="text-2xl text-black-light pb-1">{{ $post->title }}</h1>
        <p class="text-base text-grey-darker pb-2">{{ $post->content_excerpt }}</p>
        <a
            href="{{ route('single.post.show', $post->slug) }}"
            class="text-base text-blue-light no-underline"
        >
            Read more
        </a>
    </article>
@endforeach

<div class="flex justify-between mt-16 tracking-wide">
    @unless (empty($posts->previousPageUrl()))
        <a class="no-underline hover:underline text-base font-bold text-blue" href="{{ $posts->previousPageUrl() }}">&#171; Newer</a>
    @endunless

    <a class="no-underline hover:underline text-base font-bold text-blue" href="{{ $posts->nextPageUrl() }}">Older &#187;</a>
</div>
