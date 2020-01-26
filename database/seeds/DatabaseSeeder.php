<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        DB::table('users')->delete();

        $users = array(
            ['name' => 'Elio Galvan', 'email' => 'elio@gmail.com', 'password' => Hash::make('asd')],
            ['name' => 'Pablo Galvan', 'email' => 'pablo@gmail.com', 'password' => Hash::make('123')],
            ['name' => 'Holly Lloyd', 'email' => 'holly@scotch.io', 'password' => Hash::make('secret')],
            ['name' => 'Adnan Kukic', 'email' => 'adnan@scotch.io', 'password' => Hash::make('secret')],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        //Creamos un rol, un permiso y se lo asignamos a el usuario Elio
        DB::table('roles')->insert([
            'name' => 'ADMIN'
        ]);
        DB::table('role_user')->insert([
            'user_id' => '1',
            'role_id' => '1'
        ]);
        DB::table('permissions')->insert([
            'name' => 'create-users'
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => '1',
            'role_id' => '1'
        ]);

            //Asignacion de pais - provincia - localidad - direccion
            DB::table('paises')->insert([
                'nombre' => 'Argentina',
            ]);
            DB::table('provincias')->insert([
                'nombre' => 'Tucuman',
                'pais_id' => '1',
            ]);
            DB::table('localidades')->insert([
                'nombre' => 'Concepcion',
                'provincia_id' => '1',
            ]);
            DB::table('domicilios')->insert([
                'direccion' => 'Calle Isla Soledad 25',
                'localidad_id' => '1',
            ]);
            //Cargar un empleado
            DB::table('empleados')->insert([
                'nombre' => 'Pablo',
                'apellido' => 'Galvan',
                'turno' => 'Full',
                'dni' => '36997987',
                'cuil' => '20369979877',
                'cargo' => 'Encargado',
                'sexo' => 'masculino',
                'telefono' => '3865538252',
                'fecha_nacimiento' => '1983-06-01',
                'fecha_ingreso' => '2008-06-01',
                'sueldo' => '15000',
                'domicilio_id' => '1',
                'estado' => '1',

            ]);
        Model::reguard();
    }
}
