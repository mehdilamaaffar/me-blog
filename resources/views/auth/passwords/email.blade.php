@extends('layouts.auth')

@section('title')
Reset Password
@endsection

@section('content')
<div class="w-full pt-10">
    @if (session('status'))
        <div class="bg-green-lightest border border-green-light text-green-dark px-4 py-3 rounded relative" role="alert">
            {{ session('status') }}
            <span class="absolute pin-t pin-b pin-r px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    <form class="w-1/4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-auto" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="mb-4">
            <p class="block text-grey-darkest text-md font-bold mb-4">
                Reset Password
            </p>
            <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                E-Mail Address
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 mb-3 text-grey-darker leading-tight{{ $errors->has('email') ? 'border-red' : '' }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <p class="text-red text-xs italic">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
                Send Password Reset Link
            </button>
        </div>
    </form>
</div>
@endsection
