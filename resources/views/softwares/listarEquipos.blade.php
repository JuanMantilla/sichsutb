@extends('../panelDeOrganizador/panelDeOrganizadorLayout')

@section('link')
    {{route('home')}}
@endsection
@section ('title')
    Listar equipos
@endsection
@section('content')
    <h1>Equipos que contienen el software </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed ">
            <tr class="info">
                <td align="center"><strong>Nombre</strong></td>
                <td align="center"><strong>Ubicacion</strong></td>
                <td align="center"><strong>Usuario</strong></td>
                <td align="center"><strong>Número serial</strong></td>
            </tr>
            @foreach($equiposTotales as $equipo)
                <tr>
                    <td align="center"><a href="{{route('equipo', ['parameter' => $equipo->hardwareId])}}" name="nombre">{{$equipo->nombre}}</a></td>
                    <td align="center"> {{$equipo->ubicacion}}</td>
                    <td align="center"> {{$equipo->usuario}}</td>
                    <td align="center"> {{$equipo->SN}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection


