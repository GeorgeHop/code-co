@extends('main')

@section('auth_user')
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <video playsinline autoplay muted loop class="video-header">
            <source src="/video/rainingCode.mp4">
        </video>
        <div class="container">
            <div class="row row-flex-custom">
                <div class="col-md-offset-3 col-md-5 col-sm-12 z-index-element">
                    <div class="login-card">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
