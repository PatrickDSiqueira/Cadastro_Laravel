<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="-token" content="{{csrf_token()}}" >
    <style>
        body{
            padding: 20px;
        }
        .navbar{
            margin-bottom: 20px;
        }
    </style>

    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">

    @component('component_navbar',["current"=>$current])
    @endcomponent
    <main role="main">
        @hasSection('body')
            @yield('body')
        @endif
    </main>

</div>

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
@hasSection('javascript')
    @yield('javascript')
@endif

</body>
</html>
