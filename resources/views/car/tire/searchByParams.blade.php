@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Поиск дисков по параметрам
                        <a href="{{ route('rim-search-by-car') }}" class="btn btn-sm btn-default pull-right">Поиск по автомобилю</a>
                        <div class="clearfix"></div>
                    </h1>
                </div>
                <div class="panel-body">
                    <search-rims-by-car :brands="{{ $brands }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection