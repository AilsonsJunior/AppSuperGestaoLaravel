<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoContoller extends Controller
{
    public function contato(Request $request) {

        
        /*
        testando o recebimento dos dados pela variavel 
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email);
        */

        /*
        implementando os dados instanciando os atributos
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        
        //print_r($contato->getAttributes());
        $contato->save();
        */

        //implementando os dados recebibos de forma geral (atenção ao metado fillable no model)
        //$contato = new SiteContato();
        //$contato->create($request->all());
        //$contato->save();

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizar validação dos dados do formulario
        $regras = [
            'nome'=>'required|min:3|max:40',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000'
        ];        

        $feedback = [
            'nome.min' => 'Este campo precisa ter no minimo 3 caracteres',
            'nome.max' => 'Este campo deve ter no maximo 40 caracteres',
            'email.email' => 'Este campo deve ser preenchido com um email valido',
            'memsagem.max' => 'O campo :attribute deve ter no maximo 2000 caracteres',

            'required' => 'Este campo :attribute precisa ser preenchido'
        ];

        $request->validate($regras, $feedback);

        //forma mais enchuta de salvar os dados
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
