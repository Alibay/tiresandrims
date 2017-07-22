@extends('layouts.profile')

@section('profile-content')

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <span>Добавить автомобиль</span>
                    <a href="{{ route('my-cars') }}" class="btn btn-sm pull-right btn-default">Отмена</a>
                </h1>
            </div>
            <div class="panel-body">
                <select-modification :brands="{{ $brands }}" />
            </div>
        </div>
@endsection
