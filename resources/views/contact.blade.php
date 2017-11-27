@extends('layouts.app')

@section('content')

@include('partials.status')

<main class="col-md-12">
    <h1 class="page-title">Contact</h1>
    <article class="post bb-n">
        <div class="entry-content clearfix">
            <form action="/contact/store" method="post" class="contact-form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="text" name="subject" placeholder="Subject" required>
                        <textarea name="message" rows="7" placeholder="Your Message" required></textarea>
                        <button class="btn-send btn-5 btn-5b ion-ios-paperplane"><span>Drop Me a Line</span></button>
                    </div>
                </div>  <!-- row -->
            </form>
        </div>
    </article>
</main>
@endsection
