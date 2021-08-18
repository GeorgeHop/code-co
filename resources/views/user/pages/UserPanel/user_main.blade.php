@extends('user.layouts.default_user')

@section('content')
    <section id="pricing" class="custom-section" data-stellar-background-ratio="0.5">
        <div class="container">

            <x-user.user-panel-header/>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Список ваших курсов</h1>
                    </div>
                </div>
            </div>
            @if( count($courses) > 0 )
                @foreach($courses as $course)
                    @if($course)
                        <div class="col-md-4 col-sm-6">
                            <div class="pricing-thumb pricing-card">
                                <div class="pricing-title">
                                    <h2>{{ $course->name }}</h2>
                                </div>
                                <div class="pricing-info">
                                    {!! $course->info !!}
                                </div>
                                <div class="pricing-bottom">
                                    @if ( count($course->groups) > 0 )
                                        @foreach($course->groups as $group)
                                            @if(Auth::user()->groups->contains($group->id))
                                                @if(!$group->is_launch)
                                                    <a class="section-btn pricing-btn pricing-btn-panel">Запуск группы {{ $group->launch_date }}</a>
                                                @elseif( $group->is_launch and count($group->videos) > 0)
                                                    <a href="{{ route('user.player', [$group->videos->first()->id]) }}" class="section-btn pricing-btn pricing-btn-panel">Учить</a>
                                                @else
                                                    <a class="section-btn pricing-btn pricing-btn-panel">Подождите немного...</a>
                                                @endif
                                            @else
                                                <a class="section-btn pricing-btn pricing-btn-panel">Добавляем вас в группу...</a>
                                            @endif
                                        @endforeach
                                    @else
                                        <a class="section-btn pricing-btn pricing-btn-panel">Обработка покупки...</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title description-min-height">
                            <h1>Список курсов пуст... <a href="{{ route('courses.list') }}">Выбрать курс ?</a></h1>
                        </div>
                    </div>
                </div>
            @endif
            </div>
    </section>
@endsection
