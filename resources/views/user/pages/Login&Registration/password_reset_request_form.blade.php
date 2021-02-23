@extends('user.layouts.auth_user')

@section('content')
    <h3>Забыли пароль ?
    </h3>
    <form method="POST" class="login-form" action="{{ route('password.reset.post') }}">
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
        <button type="submit" class="form-control">Изменить пароль</button>
    </form>
@endsection
