@extends('layouts.backend.auth')

@section('auth-subtitle')
    Confirm your password
@endsection

@section('auth-content')
    <p class="text-muted small mb-4">
        This is a secure area of the application. Please confirm your password before continuing.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required
                autocomplete="current-password" placeholder="Enter your password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth btn-primary btn-block py-2">
            Confirm
        </button>
    </form>
@endsection
