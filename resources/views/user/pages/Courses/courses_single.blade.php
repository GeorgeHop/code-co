@extends('user.layouts.default_user')

@section('content')
<section id="pricing" class="custom-section" data-stellar-background-ratio="0.5" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row">

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title">
                            <h1>{{ $course->name }}</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-10 col-sm-10">
                            <div class="post-thumbnail course-thumbnail-img" style="background-image: url('{{ URL::asset($course->thumbnail) }}')">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7">

                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="thumbnail-card">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!! $course->info !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="section-title section-title-margin-top">
                        <h1>Варианты курсов</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        @foreach($course->offers as $offer)
                            <div class="col-md-4">
                                <div class="pricing-thumb pricing-card">
                                    <div class="pricing-title">
                                        <h2>{{ $course['name'] }}</h2>
                                        <h3>{{ $offer->title }}</h3>
                                    </div>
                                    <div class="pricing-info">
                                        {!! $offer->description !!}

                                        <p>{{ $course->duration }}/ дней</p>
                                    </div>
                                    <div class="pricing-bottom">
                                        <span class="pricing-dollar">{{ $offer->cost }}</span>

                                        @if( auth()->check() )
                                            @if ( auth()->user()->courses()->wherePivot('offer_type', $offer->type)->exists() )
                                                <a href="{{ route('user.player', [$course->videos->first()->id]) }}" class="section-btn pricing-btn pricing-btn-panel">Учить</a>
                                            @else
                                                <button
                                                    type="button"
                                                    data-wfp="{{ $offer->id }}"
                                                    class="section-btn pricing-btn"
                                                >
                                                    Купить
                                                </button>
                                            @endif
                                        @else
                                            <a class="pricing-link" href="{{ route('login') }}?intended={{ url()->current() }}">
                                                Войти
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-2"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="section-title section-title-margin-top">
                        <h1>Расписание курса</h1>
                    </div>

                    <div class="col-md-1">

                    </div>
                    <div class="col-md-10">
                        <div class="accordion" id="accordionExample">
                            @foreach($course->videos as $video)
                                <div class="card-collapse">
                                    <div class="card-header" id="card_{{$loop->index}}">
                                        <h2 class="mb-0">
                                            <button class="collapse-course-list-btn" type="button" data-toggle="collapse" data-target="#collapse_card_{{$loop->index}}" aria-expanded="false" aria-controls="collapse_card_{{$loop->index}}">
                                                {{ $video->title }}
                                            </button>
                                        </h2>
                                    </div>

                                    @if($video->is_preview)
                                        <div class="row">
                                            <div class="col-md-3">

                                            </div>
                                            <div class="col-md-6">
                                                <div class="embed-responsive preview-player">
                                                    <video class="embed-responsive-item" width="420" height="540" controls controlsList="nodownload" preload="auto">
                                                        <source id="videoSource" src="{{ $video->source }}">
                                                    </video>
                                                </div>
                                            </div>
                                            <div class="col-md-3">

                                            </div>
                                        </div>
                                    @endif

                                    <div id="collapse_card_{{$loop->index}}" class="collapse" aria-labelledby="card_{{$loop->index}}" data-parent="#accordionExample">
                                        <div class="collapse-content-inner-wrapper">
                                            <h3>{{ $video->title }}</h3>
                                            <p>
                                                {!! $video->description !!}
                                            </p>
                                            @foreach($video->materials as $material)
                                                <h3>{{ $material->title }}</h3>
                                                <p>
                                                    {!! $material->description !!}
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
