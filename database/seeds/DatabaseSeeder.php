<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        //$this->call(HorarioTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class)->create([
            'name' => 'Juan Mantilla',
            'email'=> 't00024526@utbvirtual.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')

        ]);
        factory(App\User::class)->create([
            'name' => 'Organizador',
            'email'=> 'organizador@gmail.com',
            'role'=> 'organizador',
            'password' => bcrypt('organizador')

        ]);
        factory(App\ControladorEquipos::class)->create([
            'Agregar' => '0',
            'horario'=> '0',
            'equipoHorario'=> '0',

        ]);

//        factory(App\ControladorEquipos::class)->create([
//            'Agregar' => '0',
//            'horario'=> '0',
//            'equipoHorario'=> '0',
//        ]);
    }
}