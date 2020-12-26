@extends('main')

@section('registration')
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <video playsinline autoplay muted loop class="video-header">
            <source src="/video/rainingCode.mp4">
        </video>
        <div class="container">
            <div class="row row-flex-custom">

                <div class="col-md-offset-3 col-md-5 col-sm-12 z-index-element">
                    <div class="login-card">
                        <h3>Registration</h3>
                        <form action="" method="post" class="login-form">
                            <input type="email" name="email" class="form-control" placeholder="Введите свой емейл" required>
                            <input type="password" name="password" class="form-control" placeholder="Введите свой пароль" required>
                            <input type="password" name="confirm-password" class="form-control" placeholder="Повторите свой пароль" required>
                            <button type="submit" class="form-control">Отправить</button>
                        </form>
                        <p>Есть аккаунт ? <a>Log in</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
