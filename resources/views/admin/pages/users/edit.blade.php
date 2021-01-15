@extends('admin.layouts.default_admin')

@section('content')
    <div class="edit-panel">
        <form action="{{ $edit ? route('admin.posts.update', $user->id) : route('admin.users.store') }}" method="POST">
            @csrf
            @if($edit)
                @method('PUT')
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name') ?? $user->name }}" placeholder="Добавьте имя" required>
                    </div>
                    <div class="col-md-5">
                        <label for="email">email / дата верификации</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email') ?? $user->email }}" placeholder="Добавьте email" required>
                            <span class="input-group-addon">{{ $user->email_verified_at }}</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="is_admin">Юзер роль</label>
                        <select class="form-control" id="is_admin" name="is_admin">
                            <option value="">--Select--</option>
                            <option {{ ($user->is_admin ? 'selected' : '') }} value="true">Админ</option>
                            <option {{ (!$user->is_admin ? 'selected' : '') }} value="false">Юзер</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Список курсов юзера
                </h2>
                <div class="row">
                    <form action="{{ route('admin.users.subscribe', $user->id) }}" method="POST">
                        @csrf
                        <div class="col-md-3">
                            <div class="form-group">
                                <select id="courses-select" class="form-control" name="course_id">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary">Добавить курс</button>
                            </div>
                        </div>
                        <div class="col-md-8">

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($user->courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td>
                                    <form class="buttons-actions" method="POST" action="{{ route('admin.users.unsubscribe', [$user->id, $course->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
