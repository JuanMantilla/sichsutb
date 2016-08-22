<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Equipo;
use App\Software;

class Equipos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getEquipo($id){
        if(Auth::check()){
            //Busca el profesor solicitado y lo guarda como un objeto de tipo Profesor en la variable profesor
            $equipos =DB::table('hardware')->where('ID', '=', $id)->get();
            foreach ($equipos as $equipoasd){
                $equipo = new Equipo([
                    'nombre'=>$equipoasd->NAME,
                    'ubicacion'=>$equipoasd->ubicacion,
                    'usuario'=>$equipoasd->usuario,
                    'SN'=>$equipoasd->SN,
                ]);
            }
            //Guarda todos los cursos asignados al profesor solicitado en la variable cursos
            $softwares = DB::table('softwares')
                ->where('HARDWARE_ID', '=', $id)
                ->get();
            $role=Auth::user()->role;
            if( $role=='organizador') {
                //retorna la vista con las variables creadas anteriormente
                return view('equipos/detalle')->with(['softwares' =>$softwares, 'equipo'=>$equipo]);
            }elseif ($role=='admin') {
                 return view('equipos/detalleAdmin')->with(['softwares' => $softwares, 'equipo' => $equipo]);
            }
        }else return redirect()->route('login');
    }

    public function listar(){
        if(Auth::check()) {
            $equipos = DB::table('hardware')->get();
            //retorna la vista con las variables creadas anteriormente
            $role=Auth::user()->role;
            if ($role=='organizador'){
                return view('equipos/listarEquipos')->with(['equipos'=>$equipos]);
            }elseif ($role=='admin') {
                return view('equipos/listarEquiposAdmin')->with(['equipos'=>$equipos]);
            }
        }else return redirect()->route('login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
