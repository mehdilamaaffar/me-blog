@foreach ($posts as $post)
<article class="post post-1">
    <header class="entry-header">
        <h1 class="entry-title">
            {{ $post->title }}
        </h1>
        <div class="entry-meta">
            <span class="post-category emphasize">
                <a href="{{ '/category/' . $post->category->id . '/posts' }}">{{ $post->category->name }}</a>
            </span>
            <span class="post-date emphasize">
                <time class="entry-date" datetime="{{ $post->created_at->toDateTimeString() }}">{{ $post->created_at->diffForHumans() }}</time>
            </span>
            <span class="post-author emphasize">{{ $post->author->name }}</span>
        </div>
    </header>

    <div class="entry-content clearfix">
        <p>{{ $post->content_excerpt }}</p>
        <div class="read-more cl-effect-14">
            <a href="{{ route('single.post.show', $post->slug) }}" class="more-link">Continue reading <span class="meta-nav">→</span></a>
        </div>
    </div>
</article>
@endforeach

<div class="row">
    <div class="col-md-12">
        {{ $posts->links('vendor.pagination.default') }}
    </div>
</div>
