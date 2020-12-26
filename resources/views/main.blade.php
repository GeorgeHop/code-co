<?php
    $isWhite = Request::is('/') || Request::is('login') || Request::is('registration');
    $link = $isWhite ? 'white-link' : 'black-text';
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="team" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <title>{{ config('app.name') }}</title>
    <style>

    </style>
</head>
<body>
<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>


<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="index.html" class="navbar-brand {{  $isWhite ? 'navbar-brand-white' : 'navbar-brand-black' }}">{{ config('app.name') }}</a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/" class="{{ $link }}">Главная</a></li>
                <li><a href="{{ Request::is('/') ? '#feature' : '/courses' }}" class="smoothScroll {{  $link }}">Курсы</a></li>
                <li><a href="/about" class="{{  $link }}">О нас</a></li>
                <li><a href="/blog-list" class="{{  $link }}">Блог</a></li>
                <li><a href="#contact" class="{{  $link }}">Контакты</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ Request::is('login') ? '/registration' : '/login'}}" class="{{  $link }}">{{ Request::is('login') ? 'Registration' : 'Log in'}}</a></li>
            </ul>
        </div>

    </div>
</section>


@yield('welcome')
@yield('login')
@yield('registration')
@yield('blog_list')
@yield('about')
@yield('courses')


{{--    <!-- ABOUT -->--}}
{{--    <section id="about" data-stellar-background-ratio="0.5">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-md-offset-3 col-md-6 col-sm-12">--}}
{{--                    <div class="section-title">--}}
{{--                        <h1>Professional Team for you</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-4">--}}
{{--                    <div class="team-thumb">--}}
{{--                        <img src="images/team-image1.jpg" class="img-responsive" alt="Andrew Orange">--}}
{{--                        <div class="team-info team-thumb-up">--}}
{{--                            <h2>Andrew Orange</h2>--}}
{{--                            <small>Art Director</small>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-4">--}}
{{--                    <div class="team-thumb">--}}
{{--                        <div class="team-info team-thumb-down">--}}
{{--                            <h2>Catherine Soft</h2>--}}
{{--                            <small>Senior Manager</small>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>--}}
{{--                        </div>--}}
{{--                        <img src="images/team-image2.jpg" class="img-responsive" alt="Catherine Soft">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-4">--}}
{{--                    <div class="team-thumb">--}}
{{--                        <img src="images/team-image3.jpg" class="img-responsive" alt="Jack Wilson">--}}
{{--                        <div class="team-info team-thumb-up">--}}
{{--                            <h2>Jack Wilson</h2>--}}
{{--                            <small>CEO / Founder</small>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


{{--    <!-- TESTIMONIAL -->--}}
{{--    <section id="testimonial" data-stellar-background-ratio="0.5">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-md-6 col-sm-12">--}}
{{--                    <div class="testimonial-image"></div>--}}
{{--                </div>--}}

{{--                <div class="col-md-6 col-sm-12">--}}
{{--                    <div class="testimonial-info">--}}

{{--                        <div class="section-title">--}}
{{--                            <h1>What People Say</h1>--}}
{{--                        </div>--}}

{{--                        <div class="owl-carousel owl-theme">--}}
{{--                            <div class="item">--}}
{{--                                <h3>Vestibulum tempor facilisis efficitur. Sed nec nisi sit amet nibh pellentesque elementum. In viverra ipsum ornare sapien rhoncus ullamcorper.</h3>--}}
{{--                                <div class="testimonial-item">--}}
{{--                                    <img src="images/tst-image1.jpg" class="img-responsive" alt="Michael">--}}
{{--                                    <h4>Michael</h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="item">--}}
{{--                                <h3>Donec pretium tristique elit eget sodales. Pellentesque posuere, nunc id interdum venenatis, leo odio cursus sapien, ac malesuada nisl libero eget urna.</h3>--}}
{{--                                <div class="testimonial-item">--}}
{{--                                    <img src="images/tst-image2.jpg" class="img-responsive" alt="Sofia">--}}
{{--                                    <h4>Sofia</h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="item">--}}
{{--                                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</h3>--}}
{{--                                <div class="testimonial-item">--}}
{{--                                    <img src="images/tst-image3.jpg" class="img-responsive" alt="Monica">--}}
{{--                                    <h4>Monica</h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


{{--    <!-- PRICING -->--}}
{{--    <section id="pricing" data-stellar-background-ratio="0.5">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-md-12 col-sm-12">--}}
{{--                    <div class="section-title">--}}
{{--                        <h1>Choose any plan</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="pricing-thumb">--}}
{{--                        <div class="pricing-title">--}}
{{--                            <h2>Student</h2>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-info">--}}
{{--                            <p>20 Responsive Designs</p>--}}
{{--                            <p>10 Dashboards</p>--}}
{{--                            <p>1 TB Storage</p>--}}
{{--                            <p>6 TB Bandwidth</p>--}}
{{--                            <p>24-hour Support</p>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-bottom">--}}
{{--                            <span class="pricing-dollar">$200/mo</span>--}}
{{--                            <a href="#" class="section-btn pricing-btn">Register now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="pricing-thumb">--}}
{{--                        <div class="pricing-title">--}}
{{--                            <h2>Business</h2>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-info">--}}
{{--                            <p>50 Responsive Designs</p>--}}
{{--                            <p>30 Dashboards</p>--}}
{{--                            <p>2 TB Storage</p>--}}
{{--                            <p>12 TB Bandwidth</p>--}}
{{--                            <p>15-minute Support</p>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-bottom">--}}
{{--                            <span class="pricing-dollar">$350/mo</span>--}}
{{--                            <a href="#" class="section-btn pricing-btn">Register now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="pricing-thumb">--}}
{{--                        <div class="pricing-title">--}}
{{--                            <h2>Professional</h2>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-info">--}}
{{--                            <p>100 Responsive Designs</p>--}}
{{--                            <p>60 Dashboards</p>--}}
{{--                            <p>5 TB Storage</p>--}}
{{--                            <p>25 TB Bandwidth</p>--}}
{{--                            <p>1-minute Support</p>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-bottom">--}}
{{--                            <span class="pricing-dollar">$550/mo</span>--}}
{{--                            <a href="#" class="section-btn pricing-btn">Register now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


{{--    <!-- CONTACT -->--}}
{{--    <section id="contact" data-stellar-background-ratio="0.5">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-md-offset-1 col-md-10 col-sm-12">--}}
{{--                    <form id="contact-form" role="form" action="" method="post">--}}
{{--                        <div class="section-title">--}}
{{--                            <h1>Say hello to us</h1>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4 col-sm-4">--}}
{{--                            <input type="text" class="form-control" placeholder="Full name" name="name" required>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 col-sm-4">--}}
{{--                            <input type="email" class="form-control" placeholder="Email address" name="email" required>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 col-sm-4">--}}
{{--                            <input type="submit" class="form-control" name="send message" value="Send Message">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12 col-sm-12">--}}
{{--                            <textarea class="form-control" rows="8" placeholder="Your message" name="message" required></textarea>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


<!-- FOOTER -->
<footer id="footer" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="copyright-text col-md-12 col-sm-12">
                <div class="col-md-6 col-sm-6">
                    <p>Copyright &copy; 2020 Code-co</p>
                </div>

                <div class="col-md-6 col-sm-6">
                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>


<!-- SCRIPTS -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/smoothscroll.js"></script>
<script src="/js/custom.js"></script>
</body>
</html>

