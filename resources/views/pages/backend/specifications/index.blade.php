@extends('layouts.backend.admin')

@section('title', 'Specifications')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Specifications</h4>
            <p class="text-muted mb-0">Manage specifications for your products.</p>
        </div>
        <a href="{{ route('specifications.create') }}" class="btn btn-auth">Add Specification</a>
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
                        @forelse ($specifications as $specification)
                            <tr>
                                <td class="font-weight-semibold">{{ $specification->name }}</td>
                                <td><code>{{ $specification->slug }}</code></td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('specifications.edit', $specification) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('specifications.destroy', $specification) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this specification?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">
                                    No specifications yet.
                                    <a href="{{ route('specifications.create') }}" class="admin-link">Add your first specification</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($specifications->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $specifications->links() }}
        </div>
    @endif
@endsection
