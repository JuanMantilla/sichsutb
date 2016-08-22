@extends('../panelDeOrganizador/panelDeOrganizadorLayout')
@section('link')
    {{route('home')}}
@endsection
@section ('title')
    Equipo
@endsection
@section('content')
    <h1>Equipo {{$equipo->nombre}}</h1>
    <hr>
    <h2>Softwares en el equipo:</h2>
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
                    <td align="center"> {{$software->NAME}}</td>
                    <td align="center"> {{$software->PUBLISHER}}</td>
                    <td align="center"> {{$software->VERSION}}</td>
                    <td align="center"> </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
