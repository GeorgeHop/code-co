@extends('user.layouts.auth_user')

@section('content')
    <h3>Вам необходимо подтвердить ваш e-mail. Для этого перейдите по ссылке в письме.</h3>

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Отправить заново</button>
    </form>
@endsection
