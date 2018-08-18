@extends('layouts.auth')

@section('title')
Reset Password
@endsection

@section('content')
<div class="w-full pt-10">
    <form class="w-1/4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-auto border-blue border-t-8" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4">
            <p class="block text-grey-darkest text-md font-bold mb-4">
                Reset Password
            </p>
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Username
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 mb-3 text-grey-darker leading-tight{{ $errors->has('email') ? 'border-red' : '' }}" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <p class="text-red text-xs italic">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight{{ $errors->has('password') ? ' border-red' : '' }}" type="password" name="password" required>
            @if ($errors->has('password'))
                <p class="text-red text-xs italic">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password-confirm">
                Confirm Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight{{ $errors->has('password') ? ' border-red' : '' }}" type="password" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <p class="text-red text-xs italic">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
                Reset Password
            </button>
        </div>
    </form>
</div>
@endsection
