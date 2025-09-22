@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Gerenciar Produtos</h1>
    <a href="{{ route('admin.produtos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Produto</a>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2 text-left">ID</th>
                <th class="border p-2 text-left">Nome</th>
                <th class="border p-2 text-left">Preço</th>
                <th class="border p-2 text-left">Estoque</th>
                <th class="border p-2 text-left">Ativo</th>
                <th class="border p-2 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td class="border p-2">{{ $produto->id }}</td>
                    <td class="border p-2">{{ $produto->nome }}</td>
                    <td class="border p-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td class="border p-2">{{ $produto->estoque }}</td>
                    <td class="border p-2">{{ $produto->ativo ? 'Sim' : 'Não' }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.produtos.edit', $produto) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('admin.produtos.destroy', $produto) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border p-4 text-center text-gray-500">Nenhum produto encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection