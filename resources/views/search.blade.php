@extends('layouts.app')

@section('content')
    <h2>You search for: {{ request('keyword') }}</h2>
    <div class="col-md-8">
        @include('partials.posts')
    </div>
@endsection
