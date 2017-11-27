@extends('layouts.app')

@section('content')
<main class="col-md-8">
    <h1 class="page-title">About Me</h1>
    <article class="post bb-n">
        <div class="entry-content clearfix">
            <figure class="img-responsive-center">
                <img class="img-responsive" src="/img/profile.jpg" alt="Developer Image" width="40%" height="30%">
            </figure>
            <div>
                <p>I\' m a software developer, writer from Sale, Morroco.</p>
                <p>You can see some of my work on <a href="{{ config('blog.github_url') }}"><span class="ion-social-github"> GitHub</span></a>, follow me on <a href="{{ config('blog.twitter_url') }}"><span class="ion-social-twitter"> Twitter</span></a> or email me at <a href="#"><span class="ion-social-email"> {{ config('blog.email_adress') }}.</span></a></p>
            </div>
        </div>
    </article>
</main>
@endsection
