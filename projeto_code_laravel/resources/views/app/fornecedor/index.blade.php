<h3>Fornecedores</h3>

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>

@elseif(count($fornecedores) > 10)
    <h3>Existem muitos fornecedores cadastrados</h3>

@else 
    <h3>Não existem fornecedores cadastrados</h3>
    
@endif --}}

@isset($fornecedores)

    @forelse ( $fornecedores as $indice => $fornecedor )
        Interação atual: {{ $loop->interation }}
        <br>
        Forncedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ: {{ $fornecedor['cnpj']}}
        <br>
        Telefone:({{ $fornecedor['ddd']}}) {{ $fornecedor['telefone']}} 
        
        @if ($loop->fist)
            <br>
            Primeiro Cadastro.
        @endif

        @if ($loop->last)
            <br>
            Ultimo Cadastro.
        @endif
        
        <hr>
        @empty
            Não existem fornecedores cadastrados!!!
    @endforelse

@endisset

