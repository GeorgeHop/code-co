@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $edit ? 'Редактирование материал' : 'Создать материал' }}</h2>
        </div>
    </div>
    <div class="edit-panel">
        <form action="{{ $edit ? route('admin.material.update', [$course->id, $video->id, $material->id]) : route('admin.material.store', [$course, $video]) }}" method="POST">
            @csrf
            @if($edit)
                @method('PUT')
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="title">Заголовок</label>
                        @error('title')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('title')}}</p>
                        </div>
                        @enderror
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $material->title }}" placeholder="Заголовок материала" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="description">Описание</label>
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
                        >{{ old('description') ?? $material->description }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
