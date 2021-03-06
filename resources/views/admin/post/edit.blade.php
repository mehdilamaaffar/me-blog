@extends('layouts.admin')

@section('content')

@include('partials.errors')

@include('partials.status')

<a href="/admin/posts" class="go-back"><span class="ion-arrow-left-c"></span> Go back</a>

<form class="form-horizontal" method="POST" action="{{ route('posts.update', $post->id) }}">
    {{ csrf_field() }}

    {{ method_field('PATCH') }}

    <fieldset>

    <!-- Form Name -->
    <legend class="pb-1">Edit this post</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="title">title</label>
        <div class="col-md-9">
            <input id="title" name="title" type="text" onkeydown="titleSlug(this)" value="{{ $post->title }}" class="form-control" required>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="category">category</label>
        <div class="col-md-9">
            <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="title slug">title slug</label>
        <div class="col-md-9">
            <input id="titleSlugId" name="slug" type="text" value="{{ $post->slug }}" class="form-control">
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="content">content</label>
        <div class="col-md-9">
            <textarea class="form-control" name="content" rows="10" required>{{ $post->content }}</textarea>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="description">description</label>
        <div class="col-md-9">
            <textarea class="form-control" rows="4" name="meta_description">{{ $post->meta_description }}</textarea>
        </div>
    </div>

    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="radios">Save as draft</label>
        <div class="col-md-4">
            <div class="radio">
                <label for="radios-0">
                <input type="radio" name="is_draft" value="0" {{ $post->is_draft == 0 ? 'checked' : null}}>no</label>
            </div>
            <div class="radio">
                <label for="radios-1">
                <input type="radio" name="is_draft" value="1" {{ $post->is_draft == 1 ? 'checked' : null}}>yes</label>
            </div>
        </div>
    </div>

    <!-- Button submit -->
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-success">Update</button>
        </div>
    </div>

    </fieldset>
</form>
@endsection

@push('scripts')
<script>
    function titleSlug(title) {
        var titleSlugId = document.getElementById('titleSlugId');

        var title = title.value.trim();

        var formatedtitleSlug = title.replace(/ /g, '-');

        titleSlugId.placeholder = formatedtitleSlug;

        titleSlugId.value = formatedtitleSlug;
    }
</script>
@endpush
