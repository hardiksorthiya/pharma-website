@extends('layouts.backend.admin')

@section('title', 'Add Therapeutic Class')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Add Therapeutic Class</h4>
        <p class="text-muted mb-0">Create a new therapeutic class with name and slug.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card admin-card">
                <div class="card-body p-4">
                    <form action="{{ route('therapeutic-classes.store') }}" method="POST">
                        @csrf
                        @include('pages.backend.therapeutic-classes._form')

                        <div class="d-flex flex-wrap mt-4">
                            <button type="submit" class="btn btn-auth mr-2">Save Therapeutic Class</button>
                            <a href="{{ route('therapeutic-classes.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/backend/dosage-type-form.js') }}"></script>
@endpush
