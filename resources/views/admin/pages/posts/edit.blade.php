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
            @error('title')
            <div class="alert alert-danger">
                <p>{{$errors->first('title')}}</p>
            </div>
            @enderror
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}" placeholder="Добавьте заголовок" required>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="author">Автор</label>
                    @error('author')
                    <div class="alert alert-danger">
                        <p>{{$errors->first('author')}}</p>
                    </div>
                    @enderror
                    <input type="text" class="form-control" id="author" name="author" value="{{ old('author') ?? $post->author }}" placeholder="Автор" required/>
                </div>

                <div class="col-md-4">
                    <label for="is_visible_for_all">Видимость поста</label>
                    <select class="form-control" id="is_visible_for_all" name="is_visible_for_all">
                        <option value="">--Select--</option>
                        <option {{ ($post->is_visible_for_all == '1' ? 'selected' : '') }} value="1">Виден всем</option>
                        <option {{ ($post->is_visible_for_all == '0' ? 'selected' : '') }} value="0">Виден только зарегестрированным пользователям</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="is_on_homepage">Показывать на главной ?</label>
                    <input id="is_on_homepage" name="is_on_homepage" type="checkbox" value="1" {{ (old('is_on_homepage') || $post->is_on_homepage) ? 'checked' : ''}}/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Текст поста</label>
            @error('description')
            <div class="alert alert-danger">
                <p>{{$errors->first('description')}}</p>
            </div>
            @enderror
            <textarea
                class="form-control tinymce"
                id="description"
                name="description"
                rows="25"
            >{{ old('description') ?? $post->description }}</textarea>
        </div>
        <div class="form-group">
            @error('thumbnail')
            <div class="alert alert-danger">
                <p>{{$errors->first('thumbnail')}}</p>
            </div>
            @enderror
            <x-admin.upload-single label="Изображение" name="thumbnail" :value="$post->thumbnail"/>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
