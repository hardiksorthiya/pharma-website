@props([
    'products' => [],
    'selectedProducts' => old('products', []),
    'sticky' => true,
])

<aside class="categories-enquiry-sidebar {{ $sticky ? '' : 'categories-enquiry-sidebar--static' }}">
    <div class="contact-card categories-enquiry-card">
        <h2 class="contact-card-title">Product Enquiry</h2>
        <span class="contact-card-line" aria-hidden="true"></span>
        <p class="categories-enquiry-intro">Select products and share your details. Our team will get back to you shortly.</p>

        @include('components.frontend.enquiry-form-fields', [
            'products' => $products,
            'selectedProducts' => $selectedProducts,
            'idPrefix' => 'enquiry',
            'submitBlock' => true,
        ])
    </div>
</aside>
