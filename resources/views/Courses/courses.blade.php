@extends('main')

@section('courses')
    <section data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <video class="header-small-video" playsinline autoplay muted loop>
            <source src="/video/rainingCode.mp4">
        </video>
    </section>
    <section id="pricing" class="custom-section" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Choose any plan</h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-thumb">
                        <div class="pricing-title">
                            <h2>Student</h2>
                        </div>
                        <div class="pricing-info">
                            <p>20 Responsive Designs</p>
                            <p>10 Dashboards</p>
                            <p>1 TB Storage</p>
                            <p>6 TB Bandwidth</p>
                            <p>24-hour Support</p>
                        </div>
                        <div class="pricing-bottom">
                            <span class="pricing-dollar">$200/mo</span>
                            <a href="#" class="section-btn pricing-btn">Register now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-thumb">
                        <div class="pricing-title">
                            <h2>Business</h2>
                        </div>
                        <div class="pricing-info">
                            <p>50 Responsive Designs</p>
                            <p>30 Dashboards</p>
                            <p>2 TB Storage</p>
                            <p>12 TB Bandwidth</p>
                            <p>15-minute Support</p>
                        </div>
                        <div class="pricing-bottom">
                            <span class="pricing-dollar">$350/mo</span>
                            <a href="#" class="section-btn pricing-btn">Register now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricing-thumb">
                        <div class="pricing-title">
                            <h2>Professional</h2>
                        </div>
                        <div class="pricing-info">
                            <p>100 Responsive Designs</p>
                            <p>60 Dashboards</p>
                            <p>5 TB Storage</p>
                            <p>25 TB Bandwidth</p>
                            <p>1-minute Support</p>
                        </div>
                        <div class="pricing-bottom">
                            <span class="pricing-dollar">$550/mo</span>
                            <a href="#" class="section-btn pricing-btn">Register now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <form id="contact-form" role="form" action="" method="post">
                        <div class="section-title">
                            <h1>Say hello to us</h1>
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
