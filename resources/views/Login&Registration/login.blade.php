@extends('main')

@section('login')
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <video playsinline autoplay muted loop class="video-header">
            <source src="/video/rainingCode.mp4">
        </video>
        <div class="container">
            <div class="row row-flex-custom">

                <div class="col-md-offset-3 col-md-5 col-sm-12 z-index-element">
                    <div class="login-card">
                        <h3>Log in</h3>
                        <form action="{{ route('login') }}" method="POST" class="login-form">
                            @csrf

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Введите свой емейл"
                                required
                            >
                            @error('email')
                                <p>{{ $errors->first('email') }}</p>
                            @enderror
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Введите свой пароль"
                                required
                            >
                            @error('password')
                                <p>{{ $errors->first('password') }}</p>
                            @enderror
                            <button type="submit" class="form-control">Отправить</button>
                        </form>
                        <p>Если нет аккаунта <a>Registration</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
