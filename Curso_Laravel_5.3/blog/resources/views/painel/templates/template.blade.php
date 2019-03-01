<!DOCTYPE html>
<html>
    <head>
        <title>{{$title or 'Painel Curso'}}</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>