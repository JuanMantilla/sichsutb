<?php

namespace App\Http\Controllers;

use App\Equipo;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Softwares extends Controller
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
    public function getEquipos($id){
        if(Auth::check()){
            //Busca el profesor solicitado y lo guarda como un objeto de tipo Profesor en la variable profesor
            $software =DB::table('softwares')->where('ID', '=', $id)->first();
            $softwares =DB::table('softwares')->where('NAME', '=', $software->NAME)->get();
            //Guarda todos los cursos asignados al profesor solicitado en la variable cursos
            $equiposTemporal=[];
            foreach ($softwares as $software){
                array_push($equiposTemporal, $software->HARDWARE_ID);
            }
            $equipos=[];
            foreach ($equiposTemporal as $equipoTemporal){
                $equiposp =DB::table('hardware')->where('ID', '=', $equipoTemporal)->get();
                foreach ($equiposp as $equipoasd){
                    $equipo = new Equipo([
                        'nombre' => $equipoasd->NAME,
                        'ubicacion' => $equipoasd->ubicacion,
                        'usuario' => $equipoasd->usuario,
                        'hardwareId' => $equipoasd->ID,
                        'SN' => $equipoasd->SN
                    ]);
                }
                array_push($equipos,$equipo);
            }
            $role=Auth::user()->role;
            if( $role=='organizador') {
                //retorna la vista con las variables creadas anteriormente
                return view('softwares/listarEquipos')->with(['software'=>$software->NAME,'equiposTotales'=>$equipos]);
            }elseif ($role=='admin') {
                return view('softwares/listarEquipos')->with(['softwares' => $softwares, 'equipo' => $equipo]);
            }
        }else return redirect()->route('login');
    }
    
    public function getSoftware($id){
        if(Auth::check()){
            //Busca el profesor solicitado y lo guarda como un objeto de tipo Profesor en la variable profesor
            $software =DB::table('softwares')->where('ID', '=', $id)->first();
            //Guarda todos los cursos asignados al profesor solicitado en la variable cursos
            $role=Auth::user()->role;
            if( $role=='organizador') {
                //retorna la vista con las variables creadas anteriormente
                return view('softwares/softwareDetalle')->with(['software'=>$software]);
            }elseif ($role=='admin') {
                return view('softwares/listarEquipos')->with(['software' => $software]);
            }
        }else return redirect()->route('login');
    }


    public function listar(){
        if(Auth::check()) {
            $sofwares = DB::table('softwaresp')
                ->orderBy('nombre', 'asc')
                ->get();
            //retorna la vista con las variables creadas anteriormente
            $role=Auth::user()->role;
            if ($role=='organizador'){
                return view('softwares/listarSoftwares')->with(['softwares'=> $sofwares]);
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
