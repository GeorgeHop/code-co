@extends('admin.layouts.default_admin')

@section('content')
<div class="edit-panel">
    <form action="{{ route('admin.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Добавьте заголовок">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}" placeholder="Автор"/>
        </div>
        <div class="form-group">
            <label for="description">Текст поста</label>
            <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
</div>
@endsection
