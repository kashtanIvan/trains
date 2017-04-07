@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Расписание поездов</h1>
        </div>
        <div class="row">
            <table class="table text-center table-bordered">
                <tr>
                    <th class="text-center">Поезд</th>
                    <th class="text-center">Время топравления</th>
                    <th class="text-center">Пункт назначения</th>
                    <th class="text-center">Расписание</th>
                </tr>
                @foreach($trains as $train)
                    @foreach($train as $trai)
                    <tr>
                        <td>{{ $trai->name }}</td>
                        <td>----</td>
                        <td>{{  $trai->station_name }}</td>
                        <td>{{ $trai->schedule }}</td>
                    </tr>
                        @endforeach
                @endforeach
            </table>
        </div>
    </div>

@endsection