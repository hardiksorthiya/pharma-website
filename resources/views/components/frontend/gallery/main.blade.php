@props(['galleries' => []])

<section class="gallery-page-section">
    <div class="container">
        @forelse ($galleries as $gallery)
            <div class="gallery-page-group" data-gallery-group="{{ $gallery->id }}">
                <h2 class="gallery-page-group-title">{{ $gallery->title }}</h2>

                @if ($gallery->images->isNotEmpty())
                    <div class="gallery-page-grid">
                        @foreach ($gallery->images as $image)
                            <button type="button"
                                class="gallery-page-item"
                                data-gallery-lightbox
                                data-image-url="{{ $image->image_url }}"
                                data-image-alt="{{ $gallery->title }} image"
                                data-gallery-group="{{ $gallery->id }}"
                                aria-label="View {{ $gallery->title }} image">
                                <img src="{{ $image->image_url }}" alt="{{ $gallery->title }} image">
                            </button>
                        @endforeach
                    </div>
                @else
                    <p class="gallery-page-empty text-muted mb-0">No images in this gallery yet.</p>
                @endif
            </div>
        @empty
            <div class="gallery-page-empty-state text-center">
                <h3 class="gallery-page-empty-title">No galleries available</h3>
                <p class="text-muted mb-0">Gallery sections will appear here once they are added from the admin panel.</p>
            </div>
        @endforelse
    </div>
</section>

<div class="modal fade gallery-lightbox" id="galleryLightbox" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content gallery-lightbox-content">
            <button type="button" class="gallery-lightbox-close" data-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>

            <button type="button" class="gallery-lightbox-nav gallery-lightbox-prev" aria-label="Previous image">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </button>

            <button type="button" class="gallery-lightbox-nav gallery-lightbox-next" aria-label="Next image">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>

            <div class="gallery-lightbox-body">
                <img src="" alt="" class="gallery-lightbox-image" id="galleryLightboxImage">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('assets/js/frontend/gallery-lightbox.js') }}"></script>
@endpush
