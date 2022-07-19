<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['motivo_contato'=>'Dúvida']);
        MotivoContato::create(['motivo_contato'=>'Elogio']);
        MotivoContato::create(['motivo_contato'=>'Reclamação']);
    }
}
