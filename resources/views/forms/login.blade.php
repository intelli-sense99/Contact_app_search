@extends('layout.default')
@section('content')
    <section>
        <div class="container log_container">
            <div class="form-container" id="login-form">
                <h1>Login</h1>
                <form method="POST" action="{{ route('subject.loginStore') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="username">Username</label>
                    <input type="email" id="username" name="username" placeholder="Email">
                    @error('username')
                        <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                    @enderror
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                    @enderror
                    <button type="submit" class=" my-3">Login</button>
                </form>
                <p>Don't have an account? <a href="{{ route('subject.create') }}" id="signup-link">Sign up</a></p>
            </div>
        </div>
    </section>
@endsection
