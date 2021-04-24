@extends('main')

@section('welcome')
    <!-- FEATURE -->
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <video playsinline autoplay muted loop class="video-header">
            <source src="/video/rainingCode.mp4">
        </video>
        <div class="container">
            <div class="row row-flex-custom">
                <div class="col-md-offset-3 col-md-6 col-sm-12 z-index-element">
                    <div class="home-info">
                        <h3>Запишись на практический индивидуальный курс.</h3>
                        <h1>CodE-co</h1>
                        <a href="#feature" class="nav-link">
                            <div class="scroll-down-button">
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Что вы можете выучить с нами ?</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 main-courses">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($courses as $course)
                        <li class="{{ $loop->index === 0 ? 'active' : '' }}"><a href="#tab{{ $course->id }}" aria-controls="tab{{ $course->id }}" role="tab" data-toggle="tab">{{ $course->name }}</a></li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach($courses as $course)
                        <div class="tab-pane {{ $loop->index === 0 ? 'active' : '' }}" id="tab{{ $course->id }}" role="tabpanel">
                            <div class="tab-pane-item">
                                <h2>{{ $course->name }}</h2>
                                {!! $course->info !!}
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Мало курсов ?</h3>
                        </div>
                        <div class="col-md-12">
                            <a class="form-control" href="{{ route('courses.list') }}">Переходи к списку всех курсов</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="feature-image">
                    <img src="images/programmer.png" class="img-responsive" alt="Thin Laptop">
                </div>
            </div>
        </div>
    </section>

    <section style="background: white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Статьи</h1>
                    </div>
                </div>
            </div>

            <?php
            $cols = 3;
            $rows = 0;
            ?>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 col-sm-4">
                        <a href="{{ route('single', $post) }}">
                            <div class="blog-part" style="background-image: url('{{ URL::asset($post->thumbnail) }}');">
                                <div class="blog-part-overlay">
                                    {{ $post['title'] }}

                                    <div class="blog-part-bottom">
                                        <p>
                                            Автор: {{ $post['author'] }}
                                        </p>
                                    </div>
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

{{--    <section id="reviews">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12 col-sm-12">--}}
{{--                    <div class="section-title">--}}
{{--                        <h1>Что о нас говорят</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="owl-carousel owl-theme">--}}
{{--                        <div class="item">--}}
{{--                            <div class="carousel-card-container card-container-animation-one">--}}
{{--                                <div class="carousel-card-user-image">--}}

{{--                                </div>--}}
{{--                                <div class="carousel-card-comment">--}}
{{--                                    <h2 class="carousel-card-comment-text">--}}
{{--                                        User Name--}}
{{--                                    </h2>--}}
{{--                                    <p class="carousel-card-comment-text">--}}
{{--                                        fkaldklasklfds fkaldklasklfds fkaldklasklfds--}}
{{--                                        fkaldklasklfdsfkaldklasklfds fkaldklasklfds--}}
{{--                                        fkaldklasklfdsfkaldklasklfds--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item">--}}
{{--                            <div class="carousel-card-container card-container-animation-one">--}}
{{--                                <div class="carousel-card-user-image">--}}

{{--                                </div>--}}
{{--                                <div class="carousel-card-comment">--}}
{{--                                    <h2 class="carousel-card-comment-text">--}}
{{--                                        User Name--}}
{{--                                    </h2>--}}
{{--                                    <p class="carousel-card-comment-text">--}}
{{--                                        fkaldklasklfds fkaldklasklfds fkaldklasklfds--}}
{{--                                        fkaldklasklfdsfkaldklasklfds fkaldklasklfds--}}
{{--                                        fkaldklasklfdsfkaldklasklfds--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection

