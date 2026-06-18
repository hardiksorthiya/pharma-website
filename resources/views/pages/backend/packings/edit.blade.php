@extends('layouts.backend.admin')

@section('title', 'Edit Packing')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Edit Packing</h4>
        <p class="text-muted mb-0">Update packing details for {{ $packing->name }}.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card admin-card">
                <div class="card-body p-4">
                    <form action="{{ route('packings.update', $packing) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('pages.backend.packings._form', ['packing' => $packing])

                        <div class="d-flex flex-wrap mt-4">
                            <button type="submit" class="btn btn-auth mr-2">Update Packing</button>
                            <a href="{{ route('packings.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
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
