@extends('layouts.profile')

@section('profile-content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Мои автомобили
                <a href="{{ route('add-car') }}" class="btn btn-sm pull-right btn-default">Добавить автомобиль</a>
            </h1>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 my-cars-alert">
                    <div class="alert alert-warning ">
                        Необходимо добавить автомобиль, чтобы получить скидку
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
