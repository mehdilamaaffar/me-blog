@extends('layouts.app')

@section('content')
    <main class="col-md-4">
        <ul>
            @foreach ($categories as $category)
            <li><a href="/category/{{ $category->id }}/posts">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </main>
@endsection
