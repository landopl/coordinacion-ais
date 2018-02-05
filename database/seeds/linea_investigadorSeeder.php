<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\linea_investigador;

class linea_investigadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(linea_investigador::class, 5)->create();


    }
}
