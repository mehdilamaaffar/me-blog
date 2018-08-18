@extends('layouts.admin')

@section('content')
    <h3 class="border-b-2 border-grey-lighter text-dark italic pb-2 mb-4 font-light text-2xl font-sans">Posts - <span class="text-grey-darker text-base">All articles in the Databse</span></h3>
    <div class="bg-white">
        <div class="p-4 mb-4">
            <a class="hover:no-underline text-green border-2 border-green rounded p-2 inline-block hover:text-green-light hover:border-green-light" href="{{ route('posts.create') }}">
                <svg aria-hidden="true" data-prefix="far" data-icon="plus-square" class="h-4 w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M352 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm96-160v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg>
                Create new post!
            </a>
        </div>

        <table class="table table-bordered text-black">
            <thead class="flex border-b-2 border-t-2 border-grey-lighter">
                <tr class="flex flex-1">
                    <th class="border-r-2 border-grey-lighter p-3 w-auto">#</th>
                    <th class="border-r-2 border-grey-lighter p-3 w-1/5">Title</th>
                    <th class="border-r-2 border-grey-lighter p-3 w-1/5">Slug</th>
                    <th class="border-r-2 border-grey-lighter p-3 w-4/5">content</th>
                    <th class="border-r-2 border-grey-lighter p-3 w-1/5">Date</th>
                    <th class="p-3 w-1/5">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
                    <tr class="flex flex-1 text-grey-darkest">
                        <td class="border-r-2 border-grey-lighter p-3 w-auto">{{ $post->id }}</td>
                        <td class="border-r-2 border-grey-lighter p-3 w-1/5"><a href="{{ route('single.post.show', $post->slug) }}" target="blink">{{ str_limit($post->title, 20) }}</a></td>
                        <td class="border-r-2 border-grey-lighter p-3 w-1/5">{{ str_limit($post->slug, 20) }}</td>
                        <td class="border-r-2 border-grey-lighter p-3 w-4/5">{{ $post->content_excerpt }}</td>
                        <td class="border-r-2 border-grey-lighter p-3 w-1/5">{{ $post->created_at }}</td>
                        <td class="p-3 w-1/5">
                            <div class="flex justify-center">
                                <a class="px-2" href="{{ route('posts.edit', $post->id) }}">
                                    <svg aria-hidden="true" data-prefix="far" data-icon="edit" class="h-4 w-4 hover:text-grey-darker" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg>
                                </a>

                                &#9866;

                                <form class="px-2" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    {{ csrf_field() }}

                                    {{ method_field('DELETE') }}

                                    <button type="submit">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="h-4 w-4 hover:text-grey-darker" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M192 188v216c0 6.627-5.373 12-12 12h-24c-6.627 0-12-5.373-12-12V188c0-6.627 5.373-12 12-12h24c6.627 0 12 5.373 12 12zm100-12h-24c-6.627 0-12 5.373-12 12v216c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12V188c0-6.627-5.373-12-12-12zm132-96c13.255 0 24 10.745 24 24v12c0 6.627-5.373 12-12 12h-20v336c0 26.51-21.49 48-48 48H80c-26.51 0-48-21.49-48-48V128H12c-6.627 0-12-5.373-12-12v-12c0-13.255 10.745-24 24-24h74.411l34.018-56.696A48 48 0 0 1 173.589 0h100.823a48 48 0 0 1 41.16 23.304L349.589 80H424zm-269.611 0h139.223L276.16 50.913A6 6 0 0 0 271.015 48h-94.028a6 6 0 0 0-5.145 2.913L154.389 80zM368 128H80v330a6 6 0 0 0 6 6h276a6 6 0 0 0 6-6V128z"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links('vendor.pagination.tailwind') }}
    </div>
@endsection
