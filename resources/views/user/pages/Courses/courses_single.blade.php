@extends('user.layouts.default_user')

@section('content')
<section id="pricing" class="custom-section" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Выберите курс !</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="pricing-thumb">
                                    <div class="pricing-title">
                                        <h2>{{ $course['name'] }}</h2>
                                    </div>
                                    <div class="pricing-info">
                                        <p>{{ $course['info'] }}</p>
                                        <p>{{ $course['duration'] }}/ дней</p>
                                    </div>
                                    <div class="pricing-bottom">
                                        <span class="pricing-dollar">{{ $course['cost'] }}</span>
                                        <a href="{{ route('courses.show', $course->id) }}" class="section-btn pricing-btn">Register now</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
