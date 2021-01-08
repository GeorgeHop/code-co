@extends('admin.layouts.default_admin')

@section('content')
    <a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.posts.create') }}">Добавить новый пост</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Видимость</th>
            <th scope="col">Тайтл</th>
            <th scope="col">Автор</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->is_visible_for_all == 1 ? 'Виден всем' : 'Виден только юзерам'}}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>
                    <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                    <form class="buttons-actions" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
