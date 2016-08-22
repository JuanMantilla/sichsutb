<?php

namespace App\Http\Controllers;

use App\ContadorSoftware;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Equipo;
use App\Software;

class panelDeOrganizador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role=='organizador') {
            return view('panelDeOrganizador/panelDeOrganizador');
        }else return redirect()->route('login');
    }

    public function store()
    {
        $equipos = DB::table('hardware')
            ->orderBy('id', 'desc')
            ->get();
        $sns = DB::table('bios')
            ->orderBy('HARDWARE_ID', 'desc')
            ->get();
        $a = array();
        $i=0;
        foreach ($equipos as $equipo) {
            $equipoNuevo = new Equipo([
                'usuario' => "usuario",
                'ubicacion' => ""
            ]);
            $a[$i] = $equipoNuevo;
            $i++;
        }
        $j=0;
        foreach ($sns as $sn){
            echo  $a[$j]->usuario." ".$j."<br>";
            $a[$j]->SN=$sn->SSN;
            DB::table('hardware')
                ->where('ID', '=', $sn->HARDWARE_ID)
                ->update([
                    'usuario' => $a[$j]->usuario,
                    'ubicacion' => $a[$j]->ubicacion,
                    'sn' => $a[$j]->SN
                ]);
            $j++;
        }
        //DB::table('hardware')->truncate();

        //DB::table('softwares')->truncate();
    }

    public function storeSoftware(){
        DB::table('softwares')->where('NAME', 'like', '%Update%')->delete();
        DB::table('softwares')->where('NAME', 'like', '%Service Pack%')->delete();
        DB::table('softwares')->where('NAME', 'like', '%Visual C++%')->delete();
        $swu_name=[];
        $swu_id=[];
        $softwares = DB::table('softwares')->get();

        foreach ($softwares as $software){
            if (!(in_array($software->NAME, $swu_name))){
                array_push($swu_id,$software->ID);
                array_push($swu_name,$software->NAME);
            }
        }
        $i=0;
        foreach ($swu_name as $swu){
            $count = DB::table('softwares')->where('NAME', '=',$swu)->count();
            $software_a_guardar = new Software([
                'cantidad' => $count,
                'nombre' => $swu_name[$i],
                'software_id' => $swu_id[$i]
            ]);
            $software_a_guardar->save();
            $i++;
        }
    }
    
    public function storeNuevosEquipos(){
        $equipos = DB::table('hardware')->get();
        $equiposGuardados= DB::table('equiposp')->get();
        $sns = DB::table('bios')->get();

        if ($equipos){
            foreach ($equipos as $equipo){
                $pivote=0;
                foreach ($equiposGuardados as $equipoGuardado){
                    if ($equipo->ID == $equipoGuardado->hardwareId){
                        $pivote=1;
                    }
                }
                if ($pivote==0){
                    foreach ($sns as $sn) {
                        echo $sn->HARDWARE_ID." ";
                        echo $equipo->ID."<br>";
                        if ($equipo->ID == $sn->HARDWARE_ID) {
                            $equipoNuevo = new Equipo([
                                'nombre' => $equipo->NAME,
                                'hardwareId' => $equipo->ID,
                                'SN' => $sn->SSN
                            ]);
                            $equipoNuevo->save();
                        }
                    }
                }
            }
            DB::table('hardware')->truncate();
        }else echo "hola";

    }

    
}
