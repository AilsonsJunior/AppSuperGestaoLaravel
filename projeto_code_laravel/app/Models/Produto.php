<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe() {
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }

    public function Fornecedor () {
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_produtos');
    }

}
