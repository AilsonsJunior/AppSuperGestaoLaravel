@extends('app.layouts.basico')

@section('titulo', 'Produto Pedido')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produto</p>
    </div>
    
    <div class="menu">
        <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
        <li><a href="">Consulta</a></li>
    </div>

    <div class="informacao-pagina">
        <h4>Detalhes do Pedido</h4>
        <p>ID do pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente_id }}</p>

        <div style="width: 30%; margin-left: auto; margin-right: auto">
            <h4>Itens do Pedido</h4>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Data de Inclusão do Item no Pedido</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $pedido->produtos as $produto )
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                            <td>
                                <form id="form_{{ $produto->pivot->id }}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id , 'pedido' => $pedido->id ]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @component('app.pedido_produto._components.form_create',['pedido' => $pedido, 'produtos' => $produtos ])
            @endcomponent
        </div>
    </div>

</div>

@endsection