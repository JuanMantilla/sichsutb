<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;

class panelDeSuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role=='admin') {
            return view('panelDeSuperAdmin/panelDeSuperAdmin');
        }else return redirect()->route('login');
    }
    public function agreagarSuperAdminIndex(){
        if(Auth::check() && Auth::user()->role=='admin') {
            return view('panelDeSuperAdmin/agregarSuperAdmin');
        }else return redirect()->route('login');
    }
    public function agreagarSuperAdmin(Request $request){
        if(Auth::check() && Auth::user()->role=='admin') {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role
            ]);
            $user->save();
            return view('panelDeSuperAdmin\superAdminAgregado');
        } else{
            return redirect()->route('login');
        }
    }
}
