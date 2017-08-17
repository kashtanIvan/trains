<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Train</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>

@yield('content')


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>--}}
<script>
    $('.btn').click(function() {
        console.log(2);
        $.ajax({
            'type': 'GET',
            'url': '/ajax',
            'data': '{{ csrf_token() }}',
            'success': function (data) {
                $('.modal-body').empty().append(data);
                console.log(1);
            }
        })
    });


</script>
</body>
</html>