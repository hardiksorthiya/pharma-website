@extends('layouts.backend.admin')

@section('title', 'Edit Dosage Type')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Edit Dosage Type</h4>
        <p class="text-muted mb-0">Update dosage type details for {{ $dosageType->name }}.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card admin-card">
                <div class="card-body p-4">
                    <form action="{{ route('dosage-types.update', $dosageType) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('pages.backend.dosage-types._form', ['dosageType' => $dosageType])

                        <div class="d-flex flex-wrap mt-4">
                            <button type="submit" class="btn btn-auth mr-2">Update Dosage Type</button>
                            <a href="{{ route('dosage-types.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
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
