<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos() {
        return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');
        /*
           
            1 - Modelo  do relacionamento NxN em relação ao Modelo que estamos implementando
            2 - Tabela auxiliar que armazena os registros do relacionamento 

                Quando não estamos trabalhando com nomes padronizados 
                
            3 - Representa o nome da FK da tabela maepada pelo modelo na tabela de relacimento
            4 - Representa o nome da FK da tabela mepeada pelo modelo utilizado no relacionamento que estamos utilizando
        */
    }
}
