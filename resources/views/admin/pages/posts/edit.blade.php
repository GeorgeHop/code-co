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
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}" placeholder="Добавьте заголовок" required>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="author">Автор</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{ old('author') ?? $post->author }}" placeholder="Автор" required/>
                </div>

                <div class="col-md-6">
                    <label for="is_visible_for_all">Автор</label>
                    <select class="form-control" id="is_visible_for_all" name="is_visible_for_all">
                        <option value="">--Select--</option>
                        <option {{ ($post->is_visible_for_all == '1' ? 'selected' : '') }} value="1">Виден всем</option>
                        <option {{ ($post->is_visible_for_all == '0' ? 'selected' : '') }} value="0">Виден только зарегестрированным пользователям</option>
                    </select>
                </div>
            </div>
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
