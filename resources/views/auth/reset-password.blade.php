@extends('layouts.backend.auth')

@section('auth-subtitle')
    Set a new password
@endsection

@section('auth-content')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label for="email">Email address</label>
            <input id="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                placeholder="Enter your email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required
                autocomplete="new-password" placeholder="Enter new password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" required
                autocomplete="new-password" placeholder="Confirm new password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth btn-primary btn-block py-2">
            Reset Password
        </button>
    </form>
@endsection

@section('auth-footer')
    <a href="{{ route('login') }}">Back to sign in</a>
@endsection
