<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TipoUserTableSeeder::class);
         $this->call(TurnoTableSeeder::class);
         $this->call(UsuarioTableSeeder::class);
    }
}
