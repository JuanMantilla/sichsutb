@extends('../panelDeSuperAdmin/PanelDeSuperAdminLayout')
@section('link')
    {{route('home')}}
@endsection
@section ('title')
    Equipo
@endsection
@section('content')
    <h1>Detalle de equipo</h1>
    <h3>Nombre: {{$equipo->nombre}}</h3>
    <h3>Ubicación: {{$equipo->ubicacion}}</h3>
    <h3>Usuario: {{$equipo->usuario}}</h3>
    <h3>Número serial: {{$equipo->SN}}</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed ">
            <tr class="info">
                <td align="center"><strong>Nombre</strong></td>
                <td align="center"><strong>Ubicación</strong></td>
                <td align="center"><strong>Usuario</strong></td>
                <td align="center"><strong>Número serial</strong></td>
            </tr>
                <tr>
                    <td align="center"> {{$equipo->nombre}}</td>
                    <td align="center"> {{$equipo->ubicacion}}</td>
                    <td align="center"> {{$equipo->usuario}}</td>
                    <td align="center"> {{$equipo->SN}}</td>
                </tr>
        </table>
    </div>
    <div class="text-center"><h2>Softwares en el equipo {{$equipo->nombre}}:</h2></div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed ">
            <tr class="info">
                <td align="center"><strong>Nombre</strong></td>
                <td align="center"><strong>Empresa</strong></td>
                <td align="center"><strong>Version</strong></td>
                <td align="center"><strong>Licencia</strong></td>
            </tr>
            @foreach($softwares as $software)
                <tr>
                    <td align="center"> {{$software->nombre}}</td>
                    <td align="center"> {{$software->empresa}}</td>
                    <td align="center"> {{$software->version}}</td>
                    <td align="center"> {{$software->licencia}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
