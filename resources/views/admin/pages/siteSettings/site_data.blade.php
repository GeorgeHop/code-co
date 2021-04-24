@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Настройки сайта
            </h2>
        </div>
    </div>
    <div class="edit-panel">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Соц сети
                    </h4>
                </div>
            </div>
        <a class="btn btn-primary" style="margin-right:5px; color: white" href="{{ route('admin.socials.create') }}">Добавить новую соц сеть</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название социальной сети</th>
                    <th scope="col">Ссылка</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($socials as $social)
                    @dump($social->id)
                    <tr>
                        <td>{{ $social->id }}</td>
                        <td>{{ $social->name }}</td>
                        <td>{{ $social->link }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary buttons-actions" style="margin-right:5px" href="{{ route('admin.socials.edit', $social->id) }}">Edit</a>
                            <form class="buttons-actions" method="POST" action="{{ route('admin.socials.destroy', $social->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection
