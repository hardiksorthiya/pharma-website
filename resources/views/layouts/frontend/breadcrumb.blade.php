@if (!empty($title))
    <section class="page-breadcrumb">
        <div class="container">
            <h1 class="breadcrumb-title">{{ $title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </section>
@endif
