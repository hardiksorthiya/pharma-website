<div class="modal fade enquiry-modal" id="productEnquiryModal" tabindex="-1" role="dialog" aria-labelledby="productEnquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content enquiry-modal-content">
            <div class="modal-header enquiry-modal-header">
                <div>
                    <h5 class="modal-title enquiry-modal-title" id="productEnquiryModalLabel">Product Enquiry</h5>
                    <p class="enquiry-modal-subtitle mb-0">Fill in your details and we will get back to you shortly.</p>
                </div>
                <button type="button" class="close enquiry-modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body enquiry-modal-body">
                @include('components.frontend.enquiry-form-fields', [
                    'singleProduct' => $product,
                    'idPrefix' => 'modalEnquiry',
                    'submitBlock' => true,
                ])
            </div>
        </div>
    </div>
</div>
