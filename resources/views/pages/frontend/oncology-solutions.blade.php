@extends('layouts.frontend.app')

@section('title', 'Oncology Solutions')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Oncology Solutions"
        description="High-quality oncology medicines and cytotoxic manufacturing solutions for global healthcare markets."
    />
@endsection

@section('content')
    <section class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <p class="rd-section-text">
                        Sanskriti Pharma delivers a comprehensive portfolio of oncology medicines including tablets,
                        capsules, sterile injectables, lyophilized products, and specialty high-potency formulations.
                        Our dedicated cytotoxic manufacturing facility ensures safe, compliant production for
                        patients and partners worldwide.
                    </p>
                    <a href="{{ url('/contact-us') }}" class="btn about-cta mt-3">
                        <span>Inquire About Oncology Products</span>
                        <span class="about-cta-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
