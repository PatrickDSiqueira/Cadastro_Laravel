<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <main role="main">
        @hasSection('body')
            @yield('body')
        @endif
    </main>

</div>

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>

</body>
</html>
