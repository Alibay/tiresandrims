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
                @yield('profile-content')
            </div>
        </div>
    </div>
@endsection
