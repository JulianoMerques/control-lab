<?php

use Illuminate\Database\Seeder;
use App\Domains\Usuario\Entities\Usuario;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create(['turno_id'  => 1, 'tipo_usuario_id'=>1, 'nome' => 'Juliano', 'email' => 'julianomerques@gmail.com', 'password' => bcrypt('juca19/94'), 'img'=> '/app/user/img/1.jpg']);
        Usuario::create(['turno_id'  => 2, 'tipo_usuario_id'=>2, 'nome' => 'Thiago', 'email' => 'jgl511@hotmail.com', 'password' => bcrypt('jgl511')]);
        Usuario::create(['turno_id'  => 3, 'tipo_usuario_id'=>3, 'nome' => 'Diego', 'email' => 'severino@teste.com', 'password' => bcrypt('123456')]);
    }
}
