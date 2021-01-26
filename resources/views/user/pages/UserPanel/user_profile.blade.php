@extends('user.layouts.default_user')

@section('content')
    <section id="pricing" class="custom-section" data-stellar-background-ratio="0.5">
        <div class="container">

            <x-user.user-panel-header/>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Профиль</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <div class="user-profile-image-container">
                        <label for="upload-user-image" class="user-profile-image"></label>
                        <input id="upload-user-image" type="file" class="user-profile-image-input" hidden/>
                    </div>
                </div>
                <div class="col-md-5"></div>
            </div>

            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-4">
                    <form class="profile-form">
                        <input type="text" placeholder="Name" class="profile-form-input" value="{{ $user->name }}" required/>
                        <input type="email" placeholder="Email" class="profile-form-input" value="{{ $user->email }}" disabled/>
                        <button type="submit" class="profile-form-submit">Изменить данные</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <form class="profile-form">
                        <input type="password" placeholder="Пароль" class="profile-form-input" value="{{ $user->password }}" required/>
                        <button type="submit" class="profile-form-submit">Изменить пароль</button>
                    </form>
                </div>
                <div class="col-md-2">

                </div>
            </div>

        </div>
    </section>
@endsection
