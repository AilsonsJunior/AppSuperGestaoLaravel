@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Produtos</p>
    </div>

    <div class="menu">
        <li><a href="{{ route('produto.create') }}">Novo</a></li>
        <li><a href="">Consulta</a></li>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Nome do Fornecedor</th>
                        <th>Site do Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>

                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $produtos as $produto )
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome }}</td>
                            <td>{{ $produto->fornecedor->site }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                            <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $produto->id }}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('produto.edit', ['produto' => $produto->id ]) }}">Editar</a></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                Exibi o ID do Pedido(s)
                                <p>Pedidos</p>
                                @foreach ( $produto->pedidos as $pedido )
                                    <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                        Pedido ID : {{ $pedido->id }} ,
                                    </a>
                                @endforeach
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            <div>
                
                {{ $produtos->appends($request)->links() }}

                <!--
                <br>
                {{ $produtos->count() }} - Total de registros por pagina.
                <br>
                {{ $produtos->total() }} - Total de registros
                <br>
                {{ $produtos->firstItem() }} - Numero do primeiro registro da pagina
                <br>
                {{ $produtos->lastItem() }} - Numero do ultimo registro da pagina
                -->

                <br>
                Exibindo {{ $produtos->count() }} fornecedores de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }} )

            </div>
        </div>
    </div>

</div>

@endsection