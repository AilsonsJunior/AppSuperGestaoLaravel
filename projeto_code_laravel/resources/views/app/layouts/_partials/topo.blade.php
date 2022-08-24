<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
            <li><a href="{{ route('pedido.index') }}">Pedidos</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedores</a></li>
            <li><a href="{{ route('produto.index') }}">Produtos</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>