@extends('layouts.backend.admin')

@section('title', 'Products')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Products</h4>
            <p class="text-muted mb-0">Manage your product catalog.</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-auth">Add Product</a>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>CAS No.</th>
                            <th>Categories</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    @if ($product->feature_image)
                                        <img src="{{ $product->feature_image_url }}" alt="{{ $product->title }}" class="admin-table-thumb">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="font-weight-semibold">{{ $product->title }}</td>
                                <td><code>{{ $product->slug }}</code></td>
                                <td>{{ $product->cas_no ?: '—' }}</td>
                                <td class="admin-table-desc">
                                    {{ $product->categories->pluck('title')->implode(', ') ?: '—' }}
                                </td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    No products yet.
                                    <a href="{{ route('products.create') }}" class="admin-link">Add your first product</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($products->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
@endsection
