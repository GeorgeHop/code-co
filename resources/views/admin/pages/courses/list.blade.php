@extends('admin.layouts.default_admin')

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="section-title">
            <h2>Список курсов</h2> <a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.courses.create') }}">Добавить новый курс</a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Тайтл</th>
            <th scope="col">Автор id</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->author_id }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.courses.edit', $course->id) }}">Edit</a>
                        <form class="buttons-actions" method="POST" action="{{ route('admin.courses.destroy', $course->id) }}">
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
