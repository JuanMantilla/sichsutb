@extends('../panelDeOrganizador/panelDeOrganizadorLayout')

@section('link')
    {{route('home')}}
@endsection
@section ('title')
    Listar softwares
@endsection
@section('content')
    <h1>Softwares en la base de datos</h1>
    <hr>
    <br>
    <div class="text-center">
        <div class="row">
            <div class="col-md-5">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed ">
                        <tr class="info">
                            <td align="center"><strong>Nombre</strong></td>
                            <td align="center"><strong>Cantidad</strong></td>
                        </tr>
                        @foreach($softwares as $software)
                            <tr>
                                <td align="center"><a href="{{route('softwareDetalle', ['parameter' => $software->software_id])}}" name="cantidad">{{$software->nombre}}</a></td>
                                <td align="center"><a href="{{route('software', ['parameter' => $software->software_id])}}" name="cantidad">{{$software->cantidad}}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


