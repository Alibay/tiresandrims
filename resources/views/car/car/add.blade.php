@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav ">
                    <li>
                        <a href="{{ route('my-cars') }}"><span>Мои автомобили</span></a>
                        <a href="{{ route('my-orders') }}"><span>Мои заказы</span></a>
                        <a href="{{ route('settings') }}"><span>Настройки</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Мои автомобили
                            <button class="btn btn-sm pull-right btn-default">Добавить автомобиль</button>
                        </h1>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="margin:100px 0">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-warning">
                                    Необходимо добавить автомобиль, чтобы получить скидку
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
