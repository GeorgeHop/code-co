@extends('user.layouts.auth_user')

@section('content')
    <h3>Registration</h3>
    <form action="/registration" method="POST" class="login-form">
        @csrf

        @if( session('message') )
            <div class="alert alert-danger" role="alert">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <input
            id="email"
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
            id="name"
            type="text"
            name="name"
            class="form-control"
            placeholder="Имя"
            required
        >
        @error('name')
        <p>{{ $errors->first('name') }}</p>
        @enderror
        <input
            id="password"
            type="password"
            name="password"
            class="form-control"
            placeholder="Введите свой пароль"
            required
        >
        @error('password')
        <p>{{ $errors->first('password') }}</p>
        @enderror
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="form-control"
            placeholder="Повторите свой пароль"
            required
        >
        @error('password_confirmation')
        <p>{{ $errors->first('password_confirmation') }}</p>
        @enderror
        <button type="submit" class="form-control">Отправить</button>
    </form>
    <p>Есть аккаунт ? <a>Log in</a></p>
@endsection
