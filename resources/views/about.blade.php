@extends('layouts.app')

@section('content')
<main class="col-md-8">
    <h1 class="page-title">About Me</h1>
    <article class="post bb-n">
        <div class="entry-content clearfix">
            <figure class="img-responsive-center">
                <img class="img-responsive" src="img/me.jpg" alt="Developer Image">
            </figure>
            {!! config('blog.about') !!}
        </div>
    </article>
</main>
@endsection
