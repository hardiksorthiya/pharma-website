<div class="modal fade enquiry-modal" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="resumeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content enquiry-modal-content">
            <div class="modal-header enquiry-modal-header">
                <div>
                    <h5 class="modal-title enquiry-modal-title" id="resumeModalLabel">Send Your Resume</h5>
                    <p class="enquiry-modal-subtitle mb-0">Share your details and upload your resume. Our HR team will review your application.</p>
                </div>
                <button type="button" class="close enquiry-modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body enquiry-modal-body">
                <form class="contact-form resume-form" action="{{ route('frontend.careers.resume.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="contact-label" for="resumeName">Full Name <span class="contact-required">*</span></label>
                            <div class="contact-field">
                                <span class="contact-field-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                </span>
                                <input type="text" class="contact-input @error('name') is-invalid @enderror" id="resumeName" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                            </div>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="contact-label" for="resumeEmail">Email Address <span class="contact-required">*</span></label>
                            <div class="contact-field">
                                <span class="contact-field-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </span>
                                <input type="email" class="contact-input @error('email') is-invalid @enderror" id="resumeEmail" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="contact-label" for="resumePhone">Phone Number <span class="contact-required">*</span></label>
                            <div class="contact-field">
                                <span class="contact-field-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                                    </svg>
                                </span>
                                <input type="tel" class="contact-input @error('phone') is-invalid @enderror" id="resumePhone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required>
                            </div>
                            @error('phone')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="contact-label" for="resumePosition">Position Applied For</label>
                            <div class="contact-field">
                                <span class="contact-field-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M6.5 1A1.5 1.5 0 0 1 8 2.5h4A1.5 1.5 0 0 1 13.5 4v9a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 1.5 13V4A1.5 1.5 0 0 1 3 2.5h4A1.5 1.5 0 0 1 6.5 1zM8 3a2 2 0 0 0-2 2v1h4V5a2 2 0 0 0-2-2z"/>
                                    </svg>
                                </span>
                                <input type="text" class="contact-input @error('position') is-invalid @enderror" id="resumePosition" name="position" value="{{ old('position') }}" placeholder="e.g. Quality Assurance">
                            </div>
                            @error('position')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label class="contact-label" for="resumeMessage">Cover Message</label>
                            <div class="contact-field contact-field--textarea">
                                <span class="contact-field-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.637c.393.389.83.775 1.306 1.148a9.02 9.02 0 0 0 1.544-1.16c.418.315.858.592 1.314.828l-1.379 1.14a1 1 0 0 1-1.328-.074l-1.06-1.06z"/>
                                    </svg>
                                </span>
                                <textarea class="contact-input contact-textarea @error('message') is-invalid @enderror" id="resumeMessage" name="message" rows="4" placeholder="Brief introduction or note for our HR team">{{ old('message') }}</textarea>
                            </div>
                            @error('message')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label class="contact-label" for="resumeFile">Upload Resume <span class="contact-required">*</span></label>
                            <div class="contact-field contact-field--file">
                                <span class="contact-field-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                    </svg>
                                </span>
                                <input type="file" class="contact-input resume-file-input @error('resume') is-invalid @enderror" id="resumeFile" name="resume" accept=".pdf,.doc,.docx" required>
                            </div>
                            <p class="resume-file-hint">Accepted formats: PDF, DOC, DOCX (max 5 MB)</p>
                            @error('resume')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn contact-submit">
                        <span>Submit Resume</span>
                        <span class="contact-submit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-4.178-6.995-6.998-4.178a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM14.207 1.524 2.257 8.5l4.178 2.495 3.09-5.18 1.043 1.043-1.043 1.74 1.74 1.043-5.18 3.09 2.495 4.178 6.425-11.588Z"/>
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
