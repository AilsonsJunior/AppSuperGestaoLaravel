<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoContoller extends Controller
{
    public function contato() {
        var_dump($_POST);
        return view('site.contato');
    }
}
