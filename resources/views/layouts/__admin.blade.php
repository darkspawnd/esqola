<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::script('scripts/jquery.js') !!}

    {!! Html::style('semantic-ui/dist/semantic.min.css') !!}
    {!! Html::script('semantic-ui/dist/semantic.min.js') !!}

    {!! Html::style('css/nprogress.css') !!}
    {!! Html::script('scripts/nprogress.js') !!}

    {!! Html::style('css/custom.css') !!}
    {!! Html::script('scripts/app.js') !!}

    {!! Html::script('scripts/datatables.js') !!}
    {!! Html::script('scripts/datatables-semanticui.js') !!}

    <title>Esqola | Administración</title>

</head>
<body id="app-layout">
<div class="ui fixed orange inverted main menu topa attached ">
    <div class="item fitted">{{Html::image('/img/esqola_logo.png')}}</div>
    <div class="right menu labeled icon">
        <a class="item" href="">
            <i class="icon user"></i>
            {{ $user->full_name() }}
        </a>
        <a class="item">
            <i class="icon settings"></i>
        </a>
        <a class="item orange">
            <i class="icon lightning"></i> 0
        </a>
    </div>
</div>
<div class="ui admin-main">
    <div class="ui vertical orange inverted   menu sidebar visible thin">
        <a class="ui item orange dashboard-home" href="{!! action('Admin\DashboardController@index') !!}">
            <i class="icon dashboard"></i>
            Dashboard
        </a>
        <a class="ui item orange users-home" href="{!! action('Admin\UsersController@index') !!}">
            <i class="icon university"></i>
            General
        </a>
        <a class="ui item orange scores-home" href="{!! action('Admin\ScoresController@index') !!}">
            <i class="icon book"></i>
            Notas
        </a>
        <a class="ui item orang homeworks-home" href="{!! action('Admin\HomeworksController@index') !!}">
            <i class="icon file"></i>
            Tareas
        </a>
        <a class="ui item orang contents-home" href="{!! action('Admin\ContentsController@index') !!}">
            <i class="icon content"></i>
            Contenidos
        </a>
        <a class="ui item orang events-home" href="{!! action('Admin\EventsController@index')!!}">
            <i class="icon calendar"></i>
            Eventos
        </a>
        <a class="ui item orange">
            <i class="icon setting"></i>
            Ajustes
        </a>
        <a class="ui item orange log-home" href="{!! action('Admin\SystemController@log') !!}">
            <i class="icon browser"></i>
            Log
        </a>
        <a class="ui item orange" href="{!! url('/logout') !!}">
            <i class="icon moon"></i>
            Cerrar Sesión
        </a>
    </div>

    <div class="pusher">
        @yield('content')
    </div>
</div>
<script type="application/javascript">
</script>
</body>
</html>