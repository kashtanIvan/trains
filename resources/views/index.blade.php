@extends('layouts.app')


@inject('stations', 'App\Services\TrainService')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Расписание поездов</h1>
        </div>
        <div class="row">
            <table class="table text-center table-bordered">
                <tr>
                    <th class="text-center">Поезд</th>
                    <th class="text-center">Время отправления</th>
                    <th class="text-center">Пункт назначения</th>
                    <th class="text-center">Расписание</th>
                </tr>
                @foreach($trains as $train)
                    <tr>
{{--                        {{ dd($train->toArray()) }}--}}
                        {{--{{ dd($train) }}--}}
                        <td>{{ $train->name }}</td>
                        <td>{{  $train->station()->first()->pivot->time }}</td>
                        <td>{{  $train->station()->first()->station_name }}</td>
                        <td>{{ $train->schedule }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="row">
            <ul class="nav nav-pills">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Выбор станции
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($stations->getAllStation() as $station)
                        <li><a href="{{ route('train', ['id' => $station->id]) }}">{{ $station->station_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="row">
            <ul class="list-inline">
                    <li><a href="{{ route('addTrain') }}" class="btn btn-default btn-lg active" role="button">Добавить</a>
                </li>
                <li><a href="#" class="btn btn-default btn-lg active" role="button">Ссылка</a></li>
                <li><a href="#" class="btn btn-default btn-lg active" role="button">Ссылка</a></li>
            </ul>
        </div>


    </div>

@endsection