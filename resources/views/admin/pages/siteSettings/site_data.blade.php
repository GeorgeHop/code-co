@extends('admin.layouts.default_admin')

@section('content')
    <div class="edit-panel">
        <form action="/" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Название сайта</label>
                @error('site_name')
                <div class="alert alert-danger">
                    <p>{{$errors->first('title')}}</p>
                </div>
                @enderror
                <input type="text" class="form-control" id="title" name="title" value="" placeholder="Добавьте заголовок" required>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
