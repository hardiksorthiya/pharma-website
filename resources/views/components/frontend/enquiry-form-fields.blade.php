@php
    $selectedProducts = $selectedProducts ?? old('products', []);
    $idPrefix = $idPrefix ?? 'enquiry';
    $singleProduct = $singleProduct ?? null;
@endphp

<form class="contact-form categories-enquiry-form" action="#" method="post">
    @csrf

    @if ($singleProduct)
        <div class="mb-4">
            <label class="contact-label" for="{{ $idPrefix }}ProductName">Product</label>
            <div class="contact-field">
                <span class="contact-field-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5v4h-5V3.5A2.5 2.5 0 0 1 8 1zm0 1a1.5 1.5 0 0 0-1.5 1.5V7h3V3.5A1.5 1.5 0 0 0 8 2zM3 5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>
                    </svg>
                </span>
                <input type="text"
                    class="contact-input"
                    id="{{ $idPrefix }}ProductName"
                    value="{{ $singleProduct->title }}"
                    readonly>
                <input type="hidden" name="products[]" value="{{ $singleProduct->id }}">
            </div>
        </div>
    @else
        <div class="mb-4">
            <x-frontend.checkbox-multiselect
                :id="$idPrefix.'_products'"
                name="products"
                label="Select Products"
                :items="$products"
                label-key="title"
                :selected="$selectedProducts"
                placeholder="Select products" />
        </div>
    @endif

    <div class="mb-4">
        <label class="contact-label" for="{{ $idPrefix }}Quantity">Quantity</label>
        <div class="contact-field">
            <span class="contact-field-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5V3.5A2.5 2.5 0 0 1 8 1zm3.5 3V4a3.5 3.5 0 0 0-7 0v1H3.5A1.5 1.5 0 0 0 2 6.5v7A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 12.5 4H11.5z"/>
                </svg>
            </span>
            <input type="text" class="contact-input" id="{{ $idPrefix }}Quantity" name="quantity" value="{{ old('quantity') }}" placeholder="e.g. 500 kg">
        </div>
    </div>

    <div class="mb-4">
        <label class="contact-label" for="{{ $idPrefix }}Company">Company Name</label>
        <div class="contact-field">
            <span class="contact-field-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm3.5-8.5a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0Z"/>
                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Zm13 2v9.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1Z"/>
                </svg>
            </span>
            <input type="text" class="contact-input" id="{{ $idPrefix }}Company" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name">
        </div>
    </div>

    <div class="mb-4">
        <label class="contact-label" for="{{ $idPrefix }}Person">Person Name</label>
        <div class="contact-field">
            <span class="contact-field-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </span>
            <input type="text" class="contact-input" id="{{ $idPrefix }}Person" name="person_name" value="{{ old('person_name') }}" placeholder="Person Name">
        </div>
    </div>

    <div class="mb-4">
        <label class="contact-label" for="{{ $idPrefix }}Country">Country</label>
        <div class="contact-field">
            <span class="contact-field-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg>
            </span>
            <input type="text" class="contact-input" id="{{ $idPrefix }}Country" name="country" value="{{ old('country') }}" placeholder="Country">
        </div>
    </div>

    <div class="mb-4">
        <label class="contact-label" for="{{ $idPrefix }}Address">Address</label>
        <div class="contact-field contact-field--textarea">
            <span class="contact-field-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg>
            </span>
            <textarea class="contact-input contact-textarea categories-enquiry-textarea" id="{{ $idPrefix }}Address" name="address" rows="3" placeholder="Full address">{{ old('address') }}</textarea>
        </div>
    </div>

    <div class="mb-4">
        <label class="contact-label" for="{{ $idPrefix }}Phone">Phone Number</label>
        <div class="contact-field">
            <span class="contact-field-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                </svg>
            </span>
            <input type="tel" class="contact-input" id="{{ $idPrefix }}Phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
        </div>
    </div>

    <div class="mb-4">
        <label class="contact-label" for="{{ $idPrefix }}Email">Email</label>
        <div class="contact-field">
            <span class="contact-field-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                </svg>
            </span>
            <input type="email" class="contact-input" id="{{ $idPrefix }}Email" name="email" value="{{ old('email') }}" placeholder="Email Address">
        </div>
    </div>

    <button type="submit" class="btn contact-submit {{ $submitBlock ?? false ? 'btn-block' : '' }}">
        <span>Submit Enquiry</span>
        <span class="contact-submit-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-4.178-6.995-6.998-4.178a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM14.207 1.524 2.257 8.5l4.178 2.495 3.09-5.18 1.043 1.043-1.043 1.74 1.74 1.043-5.18 3.09 2.495 4.178 6.425-11.588Z"/>
            </svg>
        </span>
    </button>
</form>
