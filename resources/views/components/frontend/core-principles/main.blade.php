@php
    $principles = [
        [
            'title' => 'Innovation and Research',
            'text' => 'We are driven by a culture of continuous innovation and research. Our APIs and FDFs foster progress and address unmet medical needs through rigorous scientific exploration.',
            'icon' => 'microscope',
        ],
        [
            'title' => 'Global Impact',
            'text' => 'Our commitment extends beyond borders. We strive to make a positive global impact by providing accessible and affordable API & FDF solutions to improve healthcare outcomes worldwide.',
            'icon' => 'globe',
        ],
        [
            'title' => 'Quality Excellence',
            'text' => 'Rigorous protocols, validated methods, and regulatory compliance ensure every product and analysis meets the highest standards of accuracy and consistency.',
            'icon' => 'quality',
        ],
        [
            'title' => 'Integrity & Ethics',
            'text' => 'We uphold transparency and ethical standards in every study, partnership, and result we deliver, building lasting trust with clients and communities.',
            'icon' => 'integrity',
        ],
    ];
@endphp

<section class="core-principles-section">
    <div class="container">

        @foreach ($principles as $index => $principle)
            <div class="row align-items-center core-principles-row {{ $index % 2 === 1 ? 'flex-lg-row-reverse' : '' }}">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="core-principles-icon">
                        @include('components.frontend.core-principles.icons.' . $principle['icon'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="core-principles-content {{ $index % 2 === 1 ? 'core-principles-content--right' : '' }}">
                        <h3 class="core-principles-item-title">{{ $principle['title'] }}</h3>
                        <p class="core-principles-item-text">{{ $principle['text'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
