@extends('layouts.admin')

@section('content')
<h3 class="bb-1 pb-1">Posts</h3>
<div class="bb-1 pb-1">
    <a href="{{ route('post.create') }}"><span class="btn btn-success">Create new post!</span></a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Slug</th>
            <th>content</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('single.post.show', $post->slug) }}" target="blink">{{ str_limit($post->title, 20) }}</a></td>
            <td>{{ str_limit($post->slug, 20) }}</td>
            <td>{{ $post->content_excerpt }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
                <a href="{{ route('post.edit', $post->id) }}">
                    <span class="ion-edit" aria-hidden="true"></span>
                </a>
                <a href="{{ route('post.destroy', $post->id) }}" style="float:right">
                    <span class="ion-android-delete" aria-hidden="true"></span></a>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}

@endsection
