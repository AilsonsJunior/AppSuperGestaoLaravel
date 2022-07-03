<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoContoller extends Controller
{
    public function contato() {
        return view('site.contato');
    }
}
