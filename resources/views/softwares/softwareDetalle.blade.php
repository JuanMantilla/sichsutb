@extends('../panelDeOrganizador/panelDeOrganizadorLayout')
@section('link')
    {{route('home')}}
@endsection
@section ('title')
    Software
@endsection
@section('content')
    <h1>Software {{$software->NAME}}</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed ">
            <tr class="info">
                <td align="center"><strong>Nombre</strong></td>
                <td align="center"><strong>Empresa</strong></td>
                <td align="center"><strong>Version</strong></td>
                <td align="center"><strong>Licencia</strong></td>
            </tr>
                <tr>
                    <td align="center"> {{$software->NAME}}</td>
                    <td align="center"> {{$software->PUBLISHER}}</td>
                    <td align="center"> {{$software->VERSION}}</td>
                    <td align="center"> {{$software->licencia}}</td>
                </tr>
        </table>
    </div>
@endsection
