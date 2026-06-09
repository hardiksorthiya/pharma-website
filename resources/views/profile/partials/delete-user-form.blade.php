<section>
    <h5 class="font-weight-bold mb-1 text-danger">Delete Account</h5>
    <p class="text-muted small mb-4">
        Once your account is deleted, all of its resources and data will be permanently deleted.
        Before deleting your account, please download any data or information that you wish to retain.
    </p>

    <button type="button" class="btn btn-danger btn-auth-danger" data-toggle="modal" data-target="#deleteAccountModal">
        Delete Account
    </button>

    <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="deleteAccountModalLabel">Delete Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted small">
                            Are you sure you want to delete your account? Please enter your password to confirm.
                        </p>

                        <div class="form-group mb-0">
                            <label for="delete_password">Password</label>
                            <input id="delete_password" name="password" type="password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="Enter your password" required>
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-auth-outline" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-auth-danger">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@if ($errors->userDeletion->isNotEmpty())
    @push('scripts')
        <script>
            $(function () {
                $('#deleteAccountModal').modal('show');
            });
        </script>
    @endpush
@endif
