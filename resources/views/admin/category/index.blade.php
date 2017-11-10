@extends('layouts.admin')

@section('content')

@include('partials.errors')

@include('partials.status')

<h3 class="bb-1 pb-1">Categories</h3>
<div class="bb-1 pb-1">
    <a href="{{ route('categories.create') }}"><span class="btn btn-success">Create new Category!</span></a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><a href="{{ route('single.post.show', $category->slug) }}" target="blink">{{ $category->name }}</a></td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}">
                    <span class="ion-edit" aria-hidden="true"></span>
                </a>
                <form action="{{ route('categories.destroy', $category->id) }}" style="float:right" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="ion-android-delete btn__submit"></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}

@endsection
