@php
    $principles = [
        [
            'title' => 'Integrity',
            'text' => 'We conduct our business with honesty, transparency, and the highest ethical standards, building lasting relationships based on trust.',
            'icon' => 'integrity',
        ],
        [
            'title' => 'Quality Excellence',
            'text' => 'We are committed to delivering pharmaceutical products that consistently meet the highest international standards of quality, safety, and efficacy.',
            'icon' => 'quality',
        ],
        [
            'title' => 'Innovation',
            'text' => 'We embrace innovation and continuous improvement to provide advanced pharmaceutical solutions that address evolving global healthcare needs.',
            'icon' => 'microscope',
        ],
        [
            'title' => 'Customer Commitment',
            'text' => 'Our customers are at the center of everything we do, and we strive to deliver exceptional service, reliable supply, and long-term value.',
            'icon' => 'customer',
        ],
        [
            'title' => 'Global Responsibility',
            'text' => 'We are dedicated to improving healthcare accessibility by delivering safe, affordable, and high-quality pharmaceutical solutions to patients around the world.',
            'icon' => 'globe',
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
