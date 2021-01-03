@extends('admin.layouts.default_admin')

@section('content')
    <a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.create') }}">Добавить новый пост</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Тайтл</th>
            <th scope="col">Автор</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>
                    <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.edit', $post->id) }}">Edit</a>
                    <form class="buttons-actions" method="POST" action="{{ route('admin.delete', $post->id) }}">
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
