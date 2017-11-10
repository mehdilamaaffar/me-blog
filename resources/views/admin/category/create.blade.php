@extends('layouts.admin')

@section('content')

@include('partials.errors')

@include('partials.status')

<a href="/admin/categories" class="go-back"><span class="ion-arrow-left-c"></span> Go back</a>

<form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">
    {{ csrf_field() }}

    <fieldset>

    <!-- Form Name -->
    <legend class="pb-1">Add new post</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="title">name</label>
        <div class="col-md-9">
            <input name="name" value="{{ old('name') }}" type="text" placeholder="name" class="form-control" required>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="description">description</label>
        <div class="col-md-9">
            <textarea class="form-control" rows="4" name="description" placeholder="description">{{ old('description') }}</textarea>
        </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-success">Post</button>
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
