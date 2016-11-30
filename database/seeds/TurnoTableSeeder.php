<?php

use Illuminate\Database\Seeder;
use App\Domains\Turno\Entities\Turno;

class TurnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turno::create(['nome'  => 'Manhã']);
        Turno::create(['nome'  => 'Tarde']);
        Turno::create(['nome'  => 'Noite']);
    }
}
