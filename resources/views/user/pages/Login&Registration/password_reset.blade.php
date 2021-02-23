@extends('user.layouts.auth_user')

@section('content')
    <h3>Изменение пароля</h3>
    <form method="POST" class="login-form" action="{{ route('password.update.post') }}">
        @csrf
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
        <input type="hidden" name="token" value="{{ $token }}" required>
        @error('password_confirmation')
        <p>{{ $errors->first('password_confirmation') }}</p>
        @enderror
        <button type="submit" class="form-control">Изменить пароль</button>
    </form>
@endsection
