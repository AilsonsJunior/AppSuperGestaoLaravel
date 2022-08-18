<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id' ];

    public function Produto() {
        return $this->belongsTo('App\Models\Produto');
    }
    
}
