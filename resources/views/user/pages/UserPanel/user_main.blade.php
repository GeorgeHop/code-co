@extends('user.layouts.default_user')

@section('content')
    <section id="pricing" class="custom-section" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="user-panel-nav">
                        <a class="user-panel-nav-link">Список курсов</a>
                        <a class="user-panel-nav-link">Корзина</a>
                        <a class="user-panel-nav-link">Профиль</a>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Список ваших курсов</h1>
                    </div>
                </div>
            </div>
                @foreach($courses as $course)
                    @if($course)
                        <div class="col-md-4 col-sm-6">
                            <div class="pricing-thumb">
                                <div class="pricing-title">
                                    <h2>{{ $course->name }}</h2>
                                </div>
                                <div class="pricing-info">
                                    {!! $course->info !!}
                                </div>
                                <div class="pricing-bottom">
                                    <a href="{{ route('user.player', [$course->videos->first()->id]) }}" class="section-btn pricing-btn pricing-btn-panel">Учить</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="section-title description-min-height">
                                    <h1>Список курсов пуст... <a href="{{ route('courses.list') }}">Выбрать курс ?</a></h1>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
    </section>
@endsection
