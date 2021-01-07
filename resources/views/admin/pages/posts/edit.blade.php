@extends('admin.layouts.default_admin')

@section('content')
<div class="edit-panel">
    <form action="{{ $edit ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}" method="POST">
        @csrf
        @if($edit)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}" placeholder="Добавьте заголовок">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') ?? $post->author }}" placeholder="Автор"/>
        </div>
        <div class="form-group">
            <label for="description">Текст поста</label>
            <textarea
                class="form-control tinymce"
                id="description"
                name="description"
                rows="25"
            >{{ old('description') ?? $post->description }}</textarea>
        </div>
        <div class="form-group">
            <x-admin.upload-single label="Изображение" name="thumbnail" :value="$post->thumbnail"/>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
