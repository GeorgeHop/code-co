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
            <th scope="col">Автор</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>React Developer</td>
            <td>Yurii Mutovkin</td>
            <td>
                <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.courses.show', 1) }}">Edit</a>
                <form class="buttons-actions" method="POST" action="">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
