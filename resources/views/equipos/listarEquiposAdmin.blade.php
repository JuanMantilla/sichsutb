@extends('../panelDeSuperAdmin/PanelDeSuperAdminLayout')

@section('link')
    {{route('home')}}
@endsection

@section ('title')
    Listar equipos
@endsection

@section('content')
    <h1>Equipos en la base de datos</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed ">
            <tr class="info">
                <td align="center"><strong>Nombre</strong></td>
                <td align="center"><strong>Ubicación</strong></td>
                <td align="center"><strong>Usuario</strong></td>
                <td align="center"><strong>Número serial</strong></td>
            </tr>
            @foreach($equipos as $equipo)
                <tr>
                    <td align="center"><a href="{{route('equipoAdmin', ['parameter' => $equipo->id])}}" name="nombre">{{$equipo->nombre}}</a></td>
                    <td align="center"> {{$equipo->ubicacion}}</td>
                    <td align="center"> {{$equipo->usuario}}</td>
                    <td align="center"> {{$equipo->SN}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection


