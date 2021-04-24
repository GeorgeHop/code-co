@extends('admin.layouts.default_admin')

@section('content')
    <div class="edit-panel">
        <div class="row">
            <div class="col-md-12">
                <h4>
                    Соц сети
                </h4>
            </div>
        </div>
            <form action="{{ $edit ? route('admin.socials.update', $social->id) : route('admin.socials.store') }}" method="POST">
                @csrf
                @if($edit)
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Название</label>
                            @error('telegram')
                            <div class="alert alert-danger">
                                <p>{{$errors->first('telegram')}}</p>
                            </div>
                            @enderror
                            <input type="text" class="form-control" id="telegram" name="telegram" value="" placeholder="Добавьте заголовок" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Instagram</label>
                            @error('instagram')
                            <div class="alert alert-danger">
                                <p>{{$errors->first('instagram')}}</p>
                            </div>
                            @enderror
                            <input type="text" class="form-control" id="instagram" name="instagram" value="" placeholder="Добавьте заголовок" required>
                        </div>
                    </div>
                </div>
            </form>
    </div>
@endsection
