@extends('layouts.backend.admin')

@section('title', 'Dosage Types')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Dosage Types</h4>
            <p class="text-muted mb-0">Manage dosage types for your products.</p>
        </div>
        <a href="{{ route('dosage-types.create') }}" class="btn btn-auth">Add Dosage Type</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <x-backend.search-form
        placeholder="Search by name or slug..."
        :value="$search" />

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
                        @forelse ($dosageTypes as $dosageType)
                            <tr>
                                <td class="font-weight-semibold">{{ $dosageType->name }}</td>
                                <td><code>{{ $dosageType->slug }}</code></td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('dosage-types.edit', $dosageType) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('dosage-types.destroy', $dosageType) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this dosage type?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">
                                    @if ($search)
                                        No dosage types found for "{{ $search }}".
                                    @else
                                        No dosage types yet.
                                        <a href="{{ route('dosage-types.create') }}" class="admin-link">Add your first dosage type</a>.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($dosageTypes->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $dosageTypes->links() }}
        </div>
    @endif
@endsection
