@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $edit ? 'Редактирование предложения' : 'Создание предложения' }}</h2>
        </div>
    </div>
    <div class="edit-panel">
        <form action="{{ $edit ? route('admin.offers.update', [$course->id, $offer->id]) : route('admin.offers.store', [$course]) }}" method="POST">
            @csrf
            @if($edit)
                @method('PUT')
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5">
                        <label for="title">Заголовок</label>
                        @error('title')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('title')}}</p>
                        </div>
                        @enderror
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $offer->title }}" placeholder="Заголовок предложения" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cost">Стоимость</label>
                        @error('cost')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('cost')}}</p>
                        </div>
                        @enderror
                        <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') ?? $offer->cost }}" placeholder="100" required>
                    </div>
                    <div class="col-md-2">
                        @if($edit)
                            <label for="type">Тип курса</label>
                            @error('type')
                                <div class="alert alert-danger">
                                    <p>{{$errors->first('type')}}</p>
                                </div>
                            @enderror
                            <select class="form-control" id="type" name="type">
                                <option value="">--Select--</option>
                                <option {{ ($offer->type == 'just_videos' ? 'selected' : '') }} value="{{$offer->type}}">Только видео</option>
                                <option {{ ($offer->type == 'full_assist' ? 'selected' : '') }} value="{{$offer->type}}">Полный курс</option>
                            </select>
                        @else
                            <label for="type">Тип курса</label>
                            @error('type')
                                <div class="alert alert-danger">
                                    <p>{{$errors->first('type')}}</p>
                                </div>
                            @enderror
                            <select class="form-control" id="type" name="type">
                                <option value="">--Select--</option>
                                <option {{ ($offer_types[0] == 'just_videos' ? 'selected' : '') }} value="{{$offer_types[0]}}">Только видео</option>
                                <option {{ ($offer_types[1] == 'full_assist' ? 'selected' : '') }} value="{{$offer_types[1]}}">Полный курс</option>
                            </select>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label for="currency">Валюта</label>
                        @error('currency')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('currency')}}</p>
                        </div>
                        @enderror
                        <select class="form-control" id="currency" name="currency">
                            <option value="">--Select--</option>
                            <option {{ ($offer->currency == 'UAH' ? 'selected' : '') }} value="UAH">UAH</option>
                            <option {{ ($offer->currency == 'RUB' ? 'selected' : '') }} value="RUB">RUB</option>
                            <option {{ ($offer->currency == 'EUR' ? 'selected' : '') }} value="EUR">EUR</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="description">Описание</label>
                        @error('description')
                        <div class="alert alert-danger">
                            <p>{{$errors->first('description')}}</p>
                        </div>
                        @enderror
                        <textarea
                            class="form-control tinymce"
                            id="description"
                            name="description"
                            rows="15"
                        >{{ old('description') ?? $offer->description }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
