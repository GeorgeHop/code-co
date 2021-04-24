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
            <div class="row">
                <div class="col-xs-6">
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
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="is_preview">Дата запуска</label>
                        @error('launch_date')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('launch_date')}}</p>
                        </div>
                        @enderror
                        <input
                            class="form-group"
                            type="date"
                            id="launch_date"
                            name="launch_date"
                            value="{{ old('launch_date') ?? $group->launch_date }}"
                        />
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="is_preview">Запустить курс ?</label>
                        @error('is_launch')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('is_launch')}}</p>
                        </div>
                        @enderror
                        <input type=checkbox id="is_launch" name="is_launch" value="1" {{ (old('is_launch') || $group->is_launch) ? 'checked' : ''}}/>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
        @if( $edit )
            <div class="row">
                <div class="col-md-12">
                    <h2>Список пользователей в группе</h2>
                </div>
            </div>
            <form action="{{ route('admin.groups.subscribe', [$course->id, $group->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <select id="courses-select" class="form-control" name="user_id">
                                @foreach($users as $user)
                                    @if($user->id !== $group->user_id)
                                        <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }} {{ $user->pivot }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Добавить юзера в группу</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Имя</th>
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
        @if( $edit )
            <div class="row">
                <div class="col-md-10">
                    <h2>Список открытых видео группы</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Порядковый номер</th>
                            <th scope="col">Название видео</th>
                            <th scope="col">Открыто ?</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($group->videos as $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->video_number }}</td>
                                    <td>{{ $video->title }}</td>
                                    <td>
                                        <form action="{{ route('admin.video.change_status', [$course->id, $group->id, $video->id]) }}" method="POST">
                                            @csrf
                                            <input
                                                type=checkbox
                                                id="is_open"
                                                name="is_open"
                                                value="1"
                                                {{ (old('is_open') || $video->pivot->is_open) ? 'checked' : ''}}
                                            />
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection

