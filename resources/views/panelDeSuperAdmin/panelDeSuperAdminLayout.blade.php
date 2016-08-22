@extends('layout')
@section('link')
    {{route('panelDeSuperAdmin')}}
@endsection
@section ('menu')

    <li>
        <a href="{{route('listarEquiposAdmin')}}">Listar equipos</a>
    </li>
    <li>
        <a href="{{route('agreagarUsuario')}}">Agregar nuevo usuario</a>
    </li>
    <li>
    </li>

    <li>
        <a href="http://172.16.9.131/">Descargar el agente</a>
    </li>
@endsection
@section('content')

    @yield('contenidoSuperAdmin')


@endsection