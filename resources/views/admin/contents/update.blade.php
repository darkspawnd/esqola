@extends('layouts/__admin')
@section('content')
    <div class="ui text menu">
        <a class="item" href="{!! action('Admin\ContentsController@index') !!}">
            <button class="ui button basic active"><i class="icon angle left ui"></i>Regresar</button>
        </a>
        <div class="right menu">
            <div class="item">
                <h5 class="ui header"> {!! Breadcrumbs::renderIfExists() !!}</h5>
            </div>
        </div>
    </div>
    <div class="ui segments">
        <div class="ui menu attached right icon labeled aligned">
            <div class="ui header item borderless">
                Agregar Contenido
            </div>
        </div>
        <div class="ui segment">
            @include ('_partials.formerrors')
            @if(isset($status))
                <div class="ui {{$status->created}} message">
                    <li>{{ $status->message }}</li>
                </div>
            @endif
            <form method="post" class="ui form error" role="form" action="{!! action('Admin\ContentsController@update') !!}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ Form::hidden('auth', $update_content->uuid) }}
                <div class="required field">
                    <label class="ui"> Título </label>
                    <input type="text" name="titulo" value="{{{ $update_content->title }}}">
                </div>
                <div class="field">
                    <label class="ui"> Descripción </label>
                    <input type="text" name="description" value="{{{ $update_content->description  }}}">
                </div>
                <div class="required field">
                    <label class="ui"> Grado </label>
                    <select name="grado" class="ui search fluid dropdown">
                        <option value=""> Grado </option>
                        @foreach($grades as $grade)
                            <option value="{{{ $grade->uuid }}}"> {{{ $grade->name }}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="required field">
                    <label class="ui"> Materia </label>
                    <select name="materia" class="ui search fluid dropdown">
                        <option value=""> Materia </option>
                        @foreach($courses as $course)
                            <option value="{{{ $course->uuid }}}"> {{{ $course->name }}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="required field">
                    <label class="ui"> Unidad </label>
                    <select name="unidad" class="ui search fluid dropdown">
                        <option value=""> Unidad </option>
                        @foreach($units as $unit)
                            <option value="{{{ $unit->id }}}"> {{{ $unit->common_name }}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label class="ui"> Archivo </label>
                    <input type="file" name="attachment" value="{{ old('file') }}">
                </div>
                <div class="field align-to-right">
                    <button class="ui button orange active submit">
                        <i class="icon add"></i>Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script type="application/javascript">
        $('.contents-home').addClass('active');
        $('.ui.dropdown')
            .dropdown({
                allowAdditions: true
            })
        ;
    </script>
@endsection