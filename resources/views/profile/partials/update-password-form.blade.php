<section>
    <h5 class="font-weight-bold mb-1">Update Password</h5>
    <p class="text-muted small mb-4">Ensure your account is using a long, random password to stay secure.</p>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="update_password_current_password">Current password</label>
            <input id="update_password_current_password" name="current_password" type="password"
                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                autocomplete="current-password" placeholder="Enter current password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="update_password_password">New password</label>
            <input id="update_password_password" name="password" type="password"
                class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                autocomplete="new-password" placeholder="Enter new password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation">Confirm password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                autocomplete="new-password" placeholder="Confirm new password">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-auth btn-primary">Update Password</button>

            @if (session('status') === 'password-updated')
                <span class="text-success small ml-3">Saved.</span>
            @endif
        </div>
    </form>
</section>
