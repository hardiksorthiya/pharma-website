@extends('layouts.backend.admin')

@section('title', 'Products')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Products</h4>
            <p class="text-muted mb-0">Manage your product catalog.</p>
        </div>
        <div class="d-flex flex-wrap">
            <button type="button" class="btn btn-auth-outline btn-outline-secondary mr-2 mb-2 mb-md-0" data-toggle="modal" data-target="#bulkProductModal">
                Bulk Product
            </button>
            <a href="{{ route('products.create') }}" class="btn btn-auth mb-2 mb-md-0">Add Product</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('import_errors'))
        <div class="alert alert-warning" role="alert">
            <strong>Some rows could not be imported:</strong>
            <ul class="mb-0 mt-2 pl-3">
                @foreach (session('import_errors') as $importError)
                    <li>{{ $importError }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-backend.search-form
        placeholder="Search by title, SKU, CAS no., category..."
        :value="$search" />

    <div class="card admin-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>SKU</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>CAS No.</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    @if ($product->feature_image_url)
                                        <img src="{{ $product->feature_image_url }}"
                                            alt="{{ $product->title }}"
                                            class="admin-table-thumb {{ $product->usesDefaultFeatureImage() ? 'admin-table-thumb--default' : '' }}">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td><code>{{ $product->sku ?: '—' }}</code></td>
                                <td class="font-weight-semibold">{{ $product->title }}</td>
                                <td>{{ $product->category?->title ?: '—' }}</td>
                                <td>{{ $product->subCategory?->title ?: '—' }}</td>
                                <td>{{ $product->cas_no ?: '—' }}</td>
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
                                <td colspan="7" class="text-center text-muted py-5">
                                    @if ($search)
                                        No products found for "{{ $search }}".
                                    @else
                                        No products yet.
                                        <a href="{{ route('products.create') }}" class="admin-link">Add your first product</a>.
                                    @endif
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

    <div class="modal fade" id="bulkProductModal" tabindex="-1" role="dialog" aria-labelledby="bulkProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('products.bulk-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="bulkProductModalLabel">Bulk Product Import</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted mb-3">
                            Upload a CSV file to import or update products. If the same SKU already exists, that product will be updated.
                        </p>

                        <div class="bulk-import-sample mb-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                <h6 class="font-weight-bold mb-0">Sample CSV Format</h6>
                                <a href="{{ route('products.bulk-template') }}" class="btn btn-sm btn-auth-outline btn-outline-secondary">
                                    Download Sample CSV
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered bulk-import-sample-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>sku</th>
                                            <th>title</th>
                                            <th>slug</th>
                                            <th>cas_no</th>
                                            <th>end_use</th>
                                            <th>category</th>
                                            <th>sub_category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>SKU-001</td>
                                            <td>Paracetamol API</td>
                                            <td>paracetamol-api</td>
                                            <td>103-90-2</td>
                                            <td>Pain relief API</td>
                                            <td>API</td>
                                            <td>Analgesics API</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <small class="form-text text-muted mt-2">
                                Columns: sku, title, slug, cas_no, end_use, available_strengths, packing, meta_title, meta_description, keywords, category, sub_category, dosage_types, therapeutic_classes, specifications.
                                Category and sub category use exact titles from admin. Sub category must belong to the selected category.
                                SKU and title are required. Use <code>|</code> to separate multiple values in relation columns. Re-uploading the same SKU updates the existing product.
                            </small>
                        </div>

                        <div class="form-group mb-0">
                            <label for="csv_file">Upload CSV File <span class="text-danger">*</span></label>
                            <input type="file"
                                class="form-control-file admin-file-input @error('csv_file') is-invalid @enderror"
                                id="csv_file"
                                name="csv_file"
                                accept=".csv,text/csv,text/plain"
                                required>
                            <small class="form-text text-muted">CSV only. Max 5MB.</small>
                            @error('csv_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-auth-outline btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-auth">Import Products</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if ($errors->has('csv_file'))
        <script>
            $('#bulkProductModal').modal('show');
        </script>
    @endif
@endpush
