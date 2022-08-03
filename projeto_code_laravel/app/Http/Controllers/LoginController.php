<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index (Request $request) {
        $erro = '';
        
        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha invalidos!!';
        } 

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar o login para ter acesso a pagina.';
        } 

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar (Request $request) {
        
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);     
        
        //recuperamos os parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o model user 
        $user = new User();

        //Verifica no banco se o usuário existe e atrui os dados ao $usuario
        $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();
        
        //verificar se o usuário existe, se ele possuir o atributo nome, entao ele existe.
        if (isset($usuario->name)) {
            
            //iniciando superglobal e atribuindo a ela os atributos do usuário 
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            return redirect()->route('app.home');

        } else {
           return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
