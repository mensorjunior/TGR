<div class="p-6 bg-white rounded shadow">
    {{-- Busca e filtro --}}
    <div class="flex items-center gap-4 mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar produtos..." class="border rounded px-3 py-2 w-1/3">
        <label class="flex items-center gap-2">
            <input type="checkbox" wire:model="somenteAtivos" class="rounded">
            Somente ativos
        </label>
    </div>

    {{-- Lista --}}
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Nome</th>
                <th class="border p-2">Preço</th>
                <th class="border p-2">Estoque</th>
                <th class="border p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td class="border p-2">{{ $produto->nome }}</td>
                    <td class="border p-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td class="border p-2">{{ $produto->estoque }}</td>
                    <td class="border p-2">
                        <button wire:click="$emit('addToCart', {{ $produto->id }})" class="bg-green-500 text-white px-2 py-1 rounded">
                            Adicionar ao Carrinho
                        </button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center p-4 text-gray-500">Nenhum produto encontrado</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
