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
            </div>
                <?php
                $cols = 3;
                $rows = 0;
                ?>
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ route('courses.show', $course->id) }}">
                                <div class="pricing-thumb pricing-card">
                                    <div class="pricing-title">
                                        <h2>{{ $course['name'] }}</h2>
                                    </div>
                                    <div class="pricing-info">
                                        {!! substr($course->info, 0, 501) !!}...
                                    </div>
                                    <div class="pricing-bottom">
                                       <h4>Длительность</h4><p>{{ $course['duration'] }}/ дней</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                        $rows++;
                        if ($rows % $cols == 0) echo '</div><div class="row">';
                        ?>
                    @endforeach
                </div>
        </div>
    </section>
@endsection
