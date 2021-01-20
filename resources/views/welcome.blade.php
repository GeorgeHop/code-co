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
                        <form action="" method="get" class="online-form">
                            <input type="email" name="email" class="form-control" placeholder="Напиши нам " required>
                            <button type="submit" class="form-control">Отправить</button>
                        </form>
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
        </div>
    </section>
@endsection

