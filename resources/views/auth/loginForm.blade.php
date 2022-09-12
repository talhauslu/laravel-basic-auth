@extends('layout')

@section('title', 'Login')

@section('content')

    @if (Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="margin-top: 50px" class="container-md">
        <form action={{ route('logincheck') }} method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username" id="username">
                <span class="text-danger">
                    @error('username')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pw">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password"
                    id="pw">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
        <p>Already a user? <a href={{ route('registrationform') }}>Sign up</a></p>
    </div>
@endsection
