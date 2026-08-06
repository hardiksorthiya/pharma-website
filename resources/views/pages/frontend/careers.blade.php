@extends('layouts.frontend.app')

@section('title', 'Careers')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Careers"
        description="Join Sanskriti Pharma and help improve global access to life-saving medicines."
    />
@endsection

@section('content')
    <section class="page-content">
        <div class="container">
            @if (session('resume_success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('resume_success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="rd-section-title">Build Your Career With Us</h2>
                    <p class="rd-section-text">
                        We are always looking for talented professionals in pharmaceutical manufacturing,
                        research, quality assurance, regulatory affairs, and global business development.
                        Explore opportunities to grow with a company committed to innovation and excellence.
                    </p>
                    <button type="button" class="btn about-cta mt-3" data-toggle="modal" data-target="#resumeModal">
                        <span>Send Your Resume</span>
                        <span class="about-cta-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    @include('components.frontend.careers.resume-modal')
@endsection

@push('scripts')
    <script>
        $(function () {
            @if ($errors->any() && !session('resume_success'))
                $('#resumeModal').modal('show');
            @endif

            $('#resumeModal').on('shown.bs.modal', function () {
                $('#resumeName').trigger('focus');
            });
        });
    </script>
@endpush
