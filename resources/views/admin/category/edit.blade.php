@extends('layouts.admin')

@section('content')

@include('partials.errors')

@include('partials.status')

<a href="/admin/categories" class="go-back"><span class="ion-arrow-left-c"></span> Go back</a>

<form class="form-horizontal" method="POST" action="{{ route('categories.update', $category->id) }}">
    {{ csrf_field() }}

    {{ method_field('PATCH') }}

    <fieldset>

    <!-- Form Name -->
    <legend class="pb-1">Edit this category</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="name">name</label>
        <div class="col-md-9">
            <input name="name" type="text" value="{{ $category->name }}" class="form-control" required>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="description">description</label>
        <div class="col-md-9">
            <textarea class="form-control" rows="4" name="description">{{ $category->description }}</textarea>
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
