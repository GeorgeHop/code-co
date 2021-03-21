@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $edit ? 'Редактирование группы' : 'Создание группы' }}</h2>
        </div>
    </div>
    <div class="edit-panel">
        <form action="{{ $edit ? route('admin.groups.update', [$course->id, $group->id]) : route('admin.groups.store', $course) }}" method="POST">
            @csrf
            @if($edit)
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Название группы</label>
                        @error('name')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('name')}}</p>
                        </div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $group->name }}" placeholder="Добавьте название группы" required>
                    </div>
                </div>
            </div>
        </form>
        @if($edit)
            <div class="row">
               <form action="{{ route('admin.groups.subscribe', [$course->id, $group->id]) }}" method="POST">
                   @csrf
                   <div class="col-md-10">
                       <div class="form-group">
                           <select id="courses-select" class="form-control" name="user_id">
                               @foreach($users as $user)
                                   <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <button type="submit" class="btn btn-sm btn-primary">Добавить юзера в группу</button>
                       </div>
                   </div>
               </form>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group->users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <form class="buttons-actions" method="POST" action="{{ route('admin.groups.unsubscribe', [$course->id, $group->id, $user->id]) }}">
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
        </div>
    </div>
@endsection

