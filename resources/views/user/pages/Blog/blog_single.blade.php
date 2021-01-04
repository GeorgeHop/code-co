@extends('user.layouts.default_user')

@section('content')
    <section class="custom-section">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h1>{{ $post->title }}</h1>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <h3 style="{{ !Auth::check() ? '-webkit-mask-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0))); height:250px' : '' }}">{!! $post->description !!}</h3>
                @if(!Auth::check())
                    <div class="blog-single-description">
                        <h4>Вам нужно создать аккаунт чтобы видеть записи на этой странице. <a href="{{ route('registration') }}">Создать аккаунт ?</a></h4>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
