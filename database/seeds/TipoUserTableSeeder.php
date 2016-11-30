<?php

use Illuminate\Database\Seeder;
use App\Domains\TipoUser\Entities\Tipo;

class TipoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create(['nome'  => 'Administrador']);
        Tipo::create(['nome'  => 'Estagiário']);
        Tipo::create(['nome'  => 'Professor']);
    }
}
