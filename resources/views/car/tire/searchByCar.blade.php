@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Поиск шин по автомобилю
                        <a href="{{ route('tire-search-by-params') }}" class="btn btn-sm btn-default pull-right">Поиск по параметрам</a>
                        <div class="clearfix"></div>
                    </h1>
                </div>
                <div class="panel-body">
                    <search-tires-by-car
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
    </div>
</div>
@endsection