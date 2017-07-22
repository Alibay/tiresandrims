@extends('layouts.admin')

@section('content')

    <div class="form form-infline">
        @foreach($settings as $setting)
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label class="pull-right">{{ $setting->description }}</label>
                    </div>
                    <div class="col-md-3">
                        @if($setting->type == \App\Settings::TYPE_ENUM)
                            <select class="form-control">
                                @if (is_array(json_decode($setting->values)))
                                    @foreach(json_decode($setting->values) as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                @else
                                    @foreach(json_decode($setting->values) as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                @endif
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{ $setting->value }}" />
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('title')
    Параметры системы
@endsection