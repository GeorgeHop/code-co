@extends('main')

@section('default_user')
    <section data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <video class="header-small-video" playsinline autoplay muted loop>
            <source src="/video/rainingCode.mp4">
        </video>
    </section>
    @yield('content')
@endsection
