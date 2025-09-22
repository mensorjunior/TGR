<nav class="bg-gray-800 text-white px-6 py-3 flex justify-between items-center">
    {{-- Logo --}}
    <a href="{{ url('/') }}" class="text-xl font-bold">
        MeuCatálogo
    </a>

    {{-- Links de navegação --}}
    <div class="flex items-center gap-6">
        <a href="{{ route('produtos.index') }}" class="hover:underline">Produtos</a>
        <a href="{{ route('pedidos.index') }}" class="hover:underline">Meus Pedidos</a>
    </div>

    {{-- Carrinho --}}
    <div class="relative">
        <a href="{{ route('carrinho.index') }}" class="flex items-center gap-2">
            🛒
            <span id="carrinho-contador" class="bg-red-500 text-xs px-2 py-1 rounded-full">
                {{ $carrinhoQuantidade }}
            </span>
        </a>
    </div>
</nav>
