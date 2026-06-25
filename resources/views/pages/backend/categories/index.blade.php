@extends('layouts.backend.admin')

@section('title', 'Product Categories')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Product Categories</h4>
            <p class="text-muted mb-0">Manage product categories for your catalog.</p>
        </div>
        <a href="{{ route('product-categories.create') }}" class="btn btn-auth">Add Category</a>
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
        placeholder="Search by title, slug or description..."
        :value="$search" />

    <div class="card admin-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ $category->image_url }}" alt="{{ $category->title }}" class="admin-table-thumb">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="font-weight-semibold">{{ $category->title }}</td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td class="admin-table-desc">{{ Str::limit($category->description, 80) }}</td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('product-categories.edit', $category) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('product-categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    @if ($search)
                                        No categories found for "{{ $search }}".
                                    @else
                                        No product categories yet.
                                        <a href="{{ route('product-categories.create') }}" class="admin-link">Add your first category</a>.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($categories->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    @endif
@endsection
