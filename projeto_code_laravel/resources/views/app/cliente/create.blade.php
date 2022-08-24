@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Cliente</p>
    </div>
    
    <div class="menu">
        <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
        <li><a href="">Consulta</a></li>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
            @component('app.cliente._components.form_create_edit')
            @endcomponent
        </div>
    </div>

</div>

@endsection