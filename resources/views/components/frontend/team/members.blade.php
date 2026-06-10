@php
    $members = [
        [
            'name' => 'Dr. Rajesh Patel',
            'role' => 'Chief Scientific Officer',
            'image' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=600&q=80',
        ],
        [
            'name' => 'Savannah Nguyen',
            'role' => 'Medical Assistant',
            'image' => 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=600&q=80',
        ],
        [
            'name' => 'Dr. Emily Chen',
            'role' => 'Head of Research',
            'image' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=600&q=80',
        ],
        [
            'name' => 'Michael Torres',
            'role' => 'Laboratory Director',
            'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
        ],
        [
            'name' => 'Dr. Priya Sharma',
            'role' => 'Quality Assurance Lead',
            'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
        ],
        [
            'name' => 'James Wilson',
            'role' => 'Clinical Research Manager',
            'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80',
        ],
        [
            'name' => 'Dr. Anna Kowalski',
            'role' => 'Biomedical Scientist',
            'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80',
        ],
        [
            'name' => 'David Okonkwo',
            'role' => 'Regulatory Affairs Specialist',
            'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&q=80',
        ],
    ];
@endphp

<section class="team-members-section">
    <div class="container">
        <div class="row">
            @foreach ($members as $member)
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-5">
                    <article class="team-card">
                        <div class="team-card-image-wrap">
                            <img class="team-card-image"
                                src="{{ $member['image'] }}"
                                alt="{{ $member['name'] }}">
                            <div class="team-card-social">
                                <a href="#" class="team-card-social-link" aria-label="{{ $member['name'] }} on LinkedIn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                    </svg>
                                </a>
                                <a href="#" class="team-card-social-link" aria-label="{{ $member['name'] }} on X">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                    </svg>
                                </a>
                                <a href="mailto:info@example.com" class="team-card-social-link" aria-label="Email {{ $member['name'] }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <h3 class="team-card-name">{{ $member['name'] }}</h3>
                        <p class="team-card-role">{{ $member['role'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
