<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste (int $p1, int $p2) {
        //echo "a soma dos numeros $p1 e $p2 é igual à: " .($p1+$p2);
        
        //return view('site.teste', ['p1' => $p1, 'p2' =>$p2] ); array associativo

        //return view('site.teste', compact('p1', 'p2') ); metodo compactex

        return view('site.teste')->with('p1', $p1)->with('p2', $p2); //with()

    }
}
