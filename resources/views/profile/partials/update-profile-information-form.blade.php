<section>
    <h5 class="font-weight-bold mb-1">Profile Information</h5>
    <p class="text-muted small mb-4">Update your account's profile information and email address.</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                placeholder="Enter your name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" required autocomplete="username"
                placeholder="Enter your email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted small mb-1">Your email address is unverified.</p>
                    <button form="send-verification" type="submit" class="btn btn-link btn-sm p-0 admin-link">
                        Click here to re-send the verification email.
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success mt-2 mb-0 py-2 small" role="alert">
                            A new verification link has been sent to your email address.
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-auth btn-primary">Save Changes</button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small ml-3">Saved.</span>
            @endif
        </div>
    </form>
</section>
