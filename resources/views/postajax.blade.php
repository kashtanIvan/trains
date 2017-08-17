@inject('stations', 'App\Services\TrainService')

<div>
    <div class="row">
        <div class="col-md-4">
            <select class="target">
                @foreach($stations->getAllStation() as $station)
                    <option value="{{ $station->id }}">{{ $station->station_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>

    <ul style="list-style-type: none">
        <li>|ssada</li>
        <li>|ssadasad</li>
        <li>|ssada</li>
        <li>|ssada</li>
        <li>|ssada</li>
        @foreach($trains as $train)
            <li>{{ $train->id }}</li>
        @endforeach
    </ul>
</div>
<script>
    $( ".target" ).change(function() {
        var d = this.value;
        $.ajax({
            'type': 'GET',
            'url': '/ajax',
            'data': {'cat': d, 's': ''},
            'success': function (data) {
                $('.modal-body').empty().append(data);
                console.log(1);
            }
        })
    })
</script>