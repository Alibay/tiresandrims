@extends('layouts.app-full')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Поиск дисков по автомобилю
                        <a href="{{ route('rim-search-by-params') }}" class="btn btn-sm btn-default pull-right">Поиск по параметрам</a>
                        <div class="clearfix"></div>
                    </h1>
                </div>
                <div class="panel-body">
                    <search-rims-by-car
                            :brands="{{ $brands }}"
                            :init-models="{{ $models }}"
                            :init-generations="{{ $generations }}"
                            :init-modifications="{{ $modifications }}"
                            :init-equipments="{{ $equipments }}"
                            :init-selected-brand="{{ $selectedBrand }}"
                            :init-selected-model="{{ $selectedModel }}"
                            :init-selected-generation="{{ $selectedGeneration }}"
                            :init-selected-modification="{{ $selectedModification }}"
                    />
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @include('shop.product._list', ['products' => [
                (object) [ 'id' => 1, 'name' => '155/70R13 82H Matador MP16 Stella 2 (лето)' ],
                (object) [ 'id' => 2, 'name' => '225/45R17 95V Continental ContiSportContact-6 (лето)' ],
            ]])
        </div>
    </div>
</div>
@endsection