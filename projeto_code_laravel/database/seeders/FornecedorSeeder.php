<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 10';
        $fornecedor->site = 'fornecedor10.com.br';
        $fornecedor->uf = 'GO';
        $fornecedor->email = 'fornecedor10@email.com';
        $fornecedor->save();

        //utilizando o metodo create (lembrar do atributo fillable na classe)
        Fornecedor::create([
            'nome'=>'Fornecedor 20',
            'site'=>'fornecedor20.com.br',
            'uf'=>'SP',
            'email'=>'fornecedor20@email.com'
        ]);

        //utilizando o metado insert (insere diretamente os dados no banco sem tratamento do eloquent)
        DB::table('fornecedores')->insert([
            'nome'=>'Fornecedor 30',
            'site'=>'fornecedor30.com.br',
            'uf'=>'SC',
            'email'=>'fornecedor30@email.com'
        ]);
    }
}
