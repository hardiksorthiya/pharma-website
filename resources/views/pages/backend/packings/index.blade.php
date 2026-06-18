@extends('layouts.backend.admin')

@section('title', 'Packings')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Packings</h4>
            <p class="text-muted mb-0">Manage packing types for your products.</p>
        </div>
        <a href="{{ route('packings.create') }}" class="btn btn-auth">Add Packing</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card admin-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($packings as $packing)
                            <tr>
                                <td class="font-weight-semibold">{{ $packing->name }}</td>
                                <td><code>{{ $packing->slug }}</code></td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('packings.edit', $packing) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('packings.destroy', $packing) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this packing?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">
                                    No packings yet.
                                    <a href="{{ route('packings.create') }}" class="admin-link">Add your first packing</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($packings->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $packings->links() }}
        </div>
    @endif
@endsection
