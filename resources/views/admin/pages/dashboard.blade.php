@extends('admin.layouts.default_admin')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary material-shadow-custom">
            <div class="panel-heading">
                <h3 class="panel-title">Курсов</h3>
            </div>
            <div class="panel-body"> {{ count($courses) }} </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success material-shadow-custom">
            <div class="panel-heading">
                <h3 class="panel-title">Пользователей</h3>
            </div>
            <div class="panel-body"> {{ count($users) }} </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-warning material-shadow-custom">
            <div class="panel-heading">
                <h3 class="panel-title">Юзеров онлайн</h3>
            </div>
            <div class="panel-body"> Пока что не работает :)  </div>
        </div>
    </div>

</div>
@endsection
