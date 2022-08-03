<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
                                    ->where('site', 'like', '%'.$request->input('site').'%')
                                    ->where('uf', 'like', '%'.$request->input('uf').'%')
                                    ->where('email', 'like', '%'.$request->input('email').'%')                            
                                    ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all() ]);
    }

    public function adicionar(Request $request) {

        $msg = '';

        //inclusao
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validacao
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :atributo deve ser preenchido.',
                'nome.min' => 'O compo Nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo Nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter 2 caracteres',
                'uf.max' => 'O campo UF deve ter 2 caracteres',
                'email' => 'O campo email não foi preenchico corretamente'
            ];
            $request->validate($regras, $feedback);

            //registro no banco de dados 
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //dados view
            $msg = 'Cadastro realizado com Sucesso';
        }

        //edicao
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizado com sucesso.';
            } else {
                $msg = 'Erro ao tentar atualizar o registro.';
            } 

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id') ,'msg' => $msg]);
        }
        
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg= ''){

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir ($id) {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
    }
}
