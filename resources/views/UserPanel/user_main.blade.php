@extends('main')

@section('user_main')
    <section id="pricing" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Список ваших курсов</h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-thumb">
                        <div class="pricing-title">
                            <h2>Mobile app developer</h2>
                        </div>
                        <div class="pricing-info">
                            <p>20 Responsive Designs</p>
                            <p>10 Dashboards</p>
                            <p>1 TB Storage</p>
                            <p>6 TB Bandwidth</p>
                            <p>24-hour Support</p>
                        </div>
                        <div class="pricing-bottom">
                            <a href="/user-course-list" class="section-btn pricing-btn pricing-btn-panel">Продолжить</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
