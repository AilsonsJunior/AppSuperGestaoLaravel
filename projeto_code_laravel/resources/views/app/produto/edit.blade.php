@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Produto - Editar</p>
    </div>

    <div class="menu">
        <li><a href="{{ route('produto.index') }}">Voltar</a></li>
        <li><a href="">Consulta</a></li>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
            @component('app.produto._components.form_create_edit', ['produto'=> $produto, 'unidades'=>$unidades])
            @endcomponent
        </div>
    </div>

</div>

@endsection