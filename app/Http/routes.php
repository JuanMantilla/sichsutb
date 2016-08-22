<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/home', [

    'uses'=>'HomeController@index',
    'as' => 'home'

]);
Route::get('/', [

    'uses'=>'HomeController@index',
    'as' => 'home'

]);

// Authentication routes...
//Route::get('login', [
//    'uses'=>'Auth\AuthController@getLogin',
//    'as' => 'login'
//]);
//Route::post('login', 'Auth\AuthController@authenticate');
//
//Route::get('logout', [
//    'uses'=>'Auth\AuthController@getLogout',
//    'as'  =>'logout'
//]);
Route::get('login', [
    'uses'=>'Auth\AuthController@getLogin',
    'as' => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', [
    'uses'=>'Auth\AuthController@getLogout',
    'as'  =>'logout'
]);

// Registration routes...
Route::get('register', [
    'uses'=>'Auth\AuthController@getRegister',
    'as' => 'register'
]);
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('registrarEquipos',[
        'uses'=>'panelDeOrganizador@store',
        'as'  => 'registrarEquipos'
    ]
);

Route::get('registrarSoftware',[
        'uses'=>'panelDeOrganizador@storeSoftware',
        'as'  => 'registrarSoftware'
    ]
);
Route::get('registrarEquiposNuevos',[
        'uses'=>'panelDeOrganizador@storeNuevosEquipos',
        'as'  => 'registrarEquiposNuevos'
    ]
);

Route::get('panelDeOrganizador',[
        'uses'=>'panelDeOrganizador@index',
        'as'  => 'panelDeOrganizador'
    ]
);
Route::get('panelDeOrganizador/ListarEquipos',[
        'uses'=>'Equipos@listar',
        'as'  => 'listarEquipos'
    ]
);
Route::get('panelDeOrganizador/equipo/{id}',[
        'uses'=>'Equipos@getEquipo',
        'as'  => 'equipo'
    ]
);
Route::get('panelDeOrganizador/software/{id}',[
        'uses'=>'Softwares@getSofwtare',
        'as'  => 'softwareDetalle'
    ]
);
Route::get('panelDeSuperAdmin',[
        'uses'=>'panelDeSuperAdmin@index',
        'as'  => 'panelDeSuperAdmin'
    ]
);
Route::get('panelDeSuperAdmin/agreagarUsuario',[
        'uses'=>'panelDeSuperAdmin@agreagarSuperAdminIndex',
        'as'  => 'agreagarUsuario'
    ]
);
Route::post('panelDeSuperAdmin/agreagarUsuario',[
        'uses'=>'panelDeSuperAdmin@agreagarSuperAdmin',
        'as'  => 'agreagarUsuario'
    ]
);
Route::get('panelDeSuperAdmin/ListarEquipos',[
        'uses'=>'Equipos@listar',
        'as'  => 'listarEquiposAdmin'
    ]
);
Route::get('panelDeSuperAdmin/equipo/{id}',[
        'uses'=>'Equipos@getEquipo',
        'as'  => 'equipoAdmin'
    ]
);

Route::get('panelDeSuperAdmin/ListarSoftware',[
        'uses'=>'Software@listar',
        'as'  => 'listarSoftwareAdmin'
    ]
);

Route::get('panelDeOrganizador/ListarSoftware',[
        'uses'=>'Softwares@listar',
        'as'  => 'listarSoftwares'
    ]
);

Route::get('panelDeOrganizador/software/{id}',[
        'uses'=>'Softwares@getSoftware',
        'as'  => 'softwareDetalle'
    ]
);
Route::get('panelDeOrganizador/equiposEnSoftware/{id}',[
        'uses'=>'Softwares@getEquipos',
        'as'  => 'software'
    ]
);