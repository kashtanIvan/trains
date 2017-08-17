@extends('layouts.app')

@inject('stations', 'App\Services\TrainService')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Расписание поездов</h1>
        </div>
        @if(Session::has('delete'))
            {{ Session::get('delete') }}
        @endif
        <div class="row">
            <table class="table text-center table-bordered">
                <tr>
                    <th class="text-center">Удалить</th>
                    <th class="text-center">Поезд</th>
                    <th class="text-center">Время отправления</th>
                    <th class="text-center">Пункт назначения</th>
                    <th class="text-center">Расписание</th>
                </tr>
                @foreach($trains as $train)
                    <tr>
                        <td>
                            <div class="actions">
                                <a href="#">
                                    <span data-toggle="tooltip" data-placement="top" title="Редактировать"
                                          class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('delete',['id'=>$train->id]) }}">
                                    <span data-toggle="tooltip" data-placement="top" title="Удалить"
                                          class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </td>
                        <td>{{ $train->name }}</td>
                        <td>{{  $train->station->first()->pivot->time }}</td>
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
                        <li><a href="{{ route('index') }}">Все станции</a></li>
                        @foreach($stations->getAllStation() as $station)
                            <li><a href="{{ route('train', ['id' => $station->id]) }}">{{ $station->station_name }}</a>
                            </li>
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


    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="my modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endsection