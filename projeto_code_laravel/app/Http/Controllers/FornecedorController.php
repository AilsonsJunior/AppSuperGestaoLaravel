<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index () {
        $fornecedores = [
            0 => ['nome' => 'Fornecedor 0', 
                'status' => 'N',
                'cnpj' => '00.000.0001/00',
                'ddd' => '11',
                'telefone' => '0000-0000' 
            ],
            1 => ['nome' => 'Fornecedor 1', 
                'status' => 'N',
                'cnpj' => '00.000.0001/00',
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            2 => ['nome' => 'Fornecedor 2', 
                'status' => 'N',
                'cnpj' => '00.000.0001/00',
                'ddd' => '32',
                'telefone' => '0000-0000' 
            ]

        ];
        return view('app.fornecedor.index', compact(
            'fornecedores'
        ));
    }
}
