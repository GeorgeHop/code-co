@extends('admin.layouts.default_admin')

@section('content')
{{--    <a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.users.create') }}">Добавить новый пост</a>--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Имя</th>
            <th scope="col">email</th>
            <th scope="col">Юзер роль</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Админ' : 'Юзер' }}</td>
                <td>
                    <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                    <form class="buttons-actions" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
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
