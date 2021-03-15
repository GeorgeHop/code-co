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
                        @error('name')
                            <div class="alert alert-danger">
                                <p>{{$errors->first('name')}}</p>
                            </div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $course->name }}" placeholder="Добавьте название курса" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cost">Стоимость</label>
                        @error('cost')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('cost')}}</p>
                        </div>
                        @enderror
                        <input type="number" class="form-control" id="cost" name="cost" value="{{ old('cost') ?? $course->cost }}" placeholder="Добавьте стоимость курса" required>
                    </div>
                    <div class="col-md-3">
                        <label for="duration">Продолжительность</label>
                        @error('duration')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('duration')}}</p>
                        </div>
                        @enderror
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
                    <div class="col-md-9">
                        <label for="info">Описание курса и что в него входит</label>
                        @error('info')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('info')}}</p>
                        </div>
                        @enderror
                        <textarea
                            class="form-control tinymce"
                            id="info"
                            name="info"
                            rows="15"
                        >{{ old('info') ?? $course->info }}</textarea>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            @error('thumbnail')
                            <div class="alert alert-danger">
                                <p>{{$errors->first('thumbnail')}}</p>
                            </div>
                            @enderror
                            <x-admin.upload-single label="Картинка курса" name="thumbnail" :value="$course->thumbnail"/>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        @if($edit)
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Группы</h2><a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.groups.create', [$course->id]) }}">Добавить группу</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Название группы</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($course->groups as $group)
                                <tr>
                                    <th scope="row">{{ $group->id }}</th>
                                    <td>{{ $group->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.groups.edit', [$course->id, $group->id]) }}">Edit</a>
                                        <form class="buttons-actions" method="POST" action="">
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
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Предложения</h2><a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.offers.create', [$course->id]) }}">Добавить опции</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Тайтл</th>
                            <th scope="col">Стоимость</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course->offers as $offer)
                            <tr>
                                <th scope="row">{{ $offer->id }}</th>
                                <td>{{ $offer->title }}</td>
                                <td>{{ $offer->cost }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.offers.edit', [$course->id, $offer->id]) }}">Edit</a>
                                    <form class="buttons-actions" method="POST" action="{{ route('admin.offers.destroy', [$course->id, $offer->id]) }}">
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
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Список видео в курсе</h2> <a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.videos.create', [$course->id]) }}">Добавить видео</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Тайтл</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course->videos as $video)
                            <tr>
                                <th scope="row">{{ $video->id }}</th>
                                <td>{{ $video->title }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.videos.edit', [$course->id, $video->id]) }}">Edit</a>
                                    <form class="buttons-actions" method="POST" action="{{ route('admin.videos.destroy', [$course->id, $video->id]) }}">
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
        @endif
    </div>
@endsection
