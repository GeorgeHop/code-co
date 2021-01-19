@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Чат</h2>
        </div>
    </div>
    <div class="edit-panel">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Приоритет</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>Test</td>
                    <td>Высокий</td>
                    <td>
                        <a class="btn btn-danger" style="margin-right:5px" href="{{ route('admin.live-chat-single') }}">Начать чат</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
