@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $edit ? 'Редактирование курса' : 'Создание курса' }}</h2>
        </div>
    </div>
    <div class="edit-panel">
        <form action="{{ $edit ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}" method="POST">
            @csrf
            @if($edit)
                @method('PUT')
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Название курса</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $course->name }}" placeholder="Добавьте название курса" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cost">Стоимость</label>
                        <input type="number" class="form-control" id="cost" name="cost" value="{{ old('cost') ?? $course->cost }}" placeholder="Добавьте стоимость курса" required>
                    </div>
                    <div class="col-md-3">
                        <label for="duration">Продолжительность</label>
                        <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') ?? $course->duration }}" placeholder="Добавьте продолжительность курса" required>
                    </div>
                    <div class="col-md-2">
                        <label for="is_on_homepage">Показывать на главной</label>
                        <input id="is_on_homepage" name="is_on_homepage" type="checkbox" value="1" {{ (old('is_on_homepage') || $course->is_on_homepage) ? 'checked' : ''}}/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="info">Описание курса и что в него входит</label>
                        <textarea
                            class="form-control tinymce"
                            id="info"
                            name="info"
                            rows="15"
                        >{{ old('info') ?? $course->info }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Список материалов в курсе</h2> <a class="btn btn-primary" style="margin-right:5px; color: white" href="#">Добавить новый курс</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Тайтл</th>
                            <th scope="col">Автор</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>React Developer</td>
                            <td>Yurii Mutovkin</td>
                            <td>
                                <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="#">Edit</a>
                                <form class="buttons-actions" method="POST" action="">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
