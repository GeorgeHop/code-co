@extends('admin.layouts.default_admin')

@section('content')
    <div class="edit-panel">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Добавьте заголовок">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" placeholder="Автор"/>
            </div>
            <div class="form-group">
                <label for="description">Текст поста</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
