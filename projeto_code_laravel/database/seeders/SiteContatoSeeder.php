<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        /*
        $contato = new SiteContato();
        $contato->nome = 'Junior';
        $contato->telefone = '(11) 1111-1111';
        $contato->email = 'junior@email.com';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Muito bom esse app, bem criativo';
        $contato->save();
        */

        SiteContato::factory()->count(100)->create();
        
    }
}
