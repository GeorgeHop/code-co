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
                                        {!! $course->info !!}
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

    <!-- CONTACT -->
    <section id="contact" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <form id="contact-form" role="form" action="" method="POST">
                        @csrf
                        <div class="section-title">
                            <h1>Пишите если есть вопросы.</h1>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <input type="text" class="form-control" placeholder="Full name" name="name" required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input type="email" class="form-control" placeholder="Email address" name="email" required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input type="submit" class="form-control" name="send message" value="Send Message">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <textarea class="form-control" rows="8" placeholder="Your message" name="message" required></textarea>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
