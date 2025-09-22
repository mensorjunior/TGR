<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Carrinho</h2>
    @if(empty($carrinho))
        <p>Carrinho vazio</p>
    @else
        <ul>
            @foreach($carrinho as $item)
                <li>{{ $item['nome'] }} - Qtd: {{ $item['quantidade'] }} - R$ {{ $item['preco'] }}</li>
            @endforeach
        </ul>
        <button wire:click="fecharPedido" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">
            Fechar Pedido
        </button>
    @endif
</div>
