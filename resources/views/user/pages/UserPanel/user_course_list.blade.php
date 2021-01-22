@extends('user.layouts.default_user')

@section('content')
    <section id="player" class="custom-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>{{ $video->course->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container display-flex">
            <div class="embed-responsive player-custom">
                <video class="embed-responsive-item" width="420" height="540" controls controlsList="nodownload" preload="auto">
                    <source id="videoSource" src="{{ $video->source }}">
                </video>
            </div>
            <div class="courses-list-container">
                @foreach($video->course->videos as $videoListItem)
                    <div class="card-custom card-custom-padding">
                        <a href="{{ route('user.player', [$videoListItem->id]) }}">
                            <span class="card-custom-circle">{{ $videoListItem->video_number }}</span> {{ $videoListItem->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        @if( count($video->materials) > 0 )
            <div class="container">
                <div class="section-title section-title-margin-top">
                    <h1>Дополнительные материалы к курсу</h1>
                </div>
                <div class="accordion" id="accordionExample" role="tabpanel">
                    @foreach($video->materials as $material)
                        <div class="card-collapse">
                            <div class="card-header" id="heading{{ $loop->index }}">
                                <h2 class="mb-0">
                                    <button class="collapse-course-list-btn" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->index }}"
                                            aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                                        {{ $material->title }}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{ $loop->index }}" class="collapse" aria-labelledby="heading{{ $loop->index }}" data-parent="#accordionExample">
                                <div class="collapse-content-inner-wrapper">
                                    {!! $material->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
@endsection
