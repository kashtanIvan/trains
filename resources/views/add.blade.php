@extends('layouts.app')


@inject('stations', 'App\Services\TrainService')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Добавление поезда</h1>
        </div>

        @if($errors)
            <div class="row">

                <p class="text-danger">Номер поезда есть уже</p>
            </div>
        @endif
        <div class="row">
            {{ Form::open(array('url' => '/add')) }}
            <div class="row">
                <div class="col-lg-6">
                    {{ Form::label('train', 'номер поезда') }}
                </div>
                <div class="col-lg-6">
                    {{ Form::text('train') }}
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        {{ Form::label('station', 'станция назначения') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::text('station') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        {{ Form::label('time', 'время отправлени') }}
                    </div>
                    <div class="col-lg-6">
                        <input type="time" name="time" placeholder="hrs:mins"
                               pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        {{ Form::label('day', 'день отправлени') }}
                    </div>
                    <div class="col-lg-6">
                        <input type="checkbox" name="day[]" value="0">понедельник<Br>
                        <input type="checkbox" name="day[]" value="1">вторник<Br>
                        <input type="checkbox" name="day[]" value="2">среда<Br>
                        <input type="checkbox" name="day[]" value="3">четверг<Br>
                        <input type="checkbox" name="day[]" value="4">пятница<br>
                        <input type="checkbox" name="day[]" value="5">суббота<br>
                        <input type="checkbox" name="day[]" value="6">воскресенье<br>
                        <input type="checkbox" name="day[]" value="7">Ежедневно<br>
                    </div>
                </div>
                {{ Form::submit('Submit')  }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection