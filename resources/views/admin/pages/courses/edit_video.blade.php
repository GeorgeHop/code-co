@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $edit ? 'Редактирование видео' : 'Создание видео' }}</h2>
        </div>
    </div>
    <div class="edit-panel">
        <form action="{{ $edit ? route('admin.videos.update', [$course->id, $video->id]) : route('admin.videos.store', [$course]) }}" method="POST">
            @csrf
            @if($edit)
                @method('PUT')
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label for="title">Заголовок</label>
                        @error('title')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('title')}}</p>
                        </div>
                        @enderror
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $video->title }}" placeholder="Добавьте заголовок" required>
                    </div>
                    <div class="col-md-3">
                        <label for="video_number">Порядковый номер</label>
                        @error('video_number')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('video_number')}}</p>
                        </div>
                        @enderror
                        <input type="text" class="form-control" id="video_number" name="video_number" value="{{ old('video_number') ?? $video->video_number }}" placeholder="Добавьте номер видео" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="description">Описание видео</label>
                        @error('description')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('description')}}</p>
                        </div>
                        @enderror
                        <textarea
                            class="form-control tinymce"
                            id="description"
                            name="description"
                            rows="15"
                        >{{ old('description') ?? $video->description }}</textarea>
                    </div>
                    <div class="col-md-6">
                        @error('source')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('source')}}</p>
                        </div>
                        @enderror
                        <x-admin.upload-single label="Видео" name="source" :value="$video->source"/>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        @if($edit)
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Список материалов для видео</h2> <a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.material.create', [$course->id, $video->id]) }}">Добавить</a>
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
                        @foreach($video->materials as $material)
                            <tr>
                                <th scope="row">{{ $material->id }}</th>
                                <td>{{ $material->title }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.material.edit', [$course->id, $video->id, $material->id]) }}">Edit</a>
                                    <form class="buttons-actions" method="POST" action="">
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
