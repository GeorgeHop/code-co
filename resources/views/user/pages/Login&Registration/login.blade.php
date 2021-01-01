@extends('user.layouts.auth_user')

@section('content')
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
@endsection
