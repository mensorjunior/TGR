@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Produto</h1>
    <form action="{{ route('admin.produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nome" class="block text-gray-700">Nome</label>
            <input type="text" name="nome" id="nome" class="border rounded px-3 py-2 w-full" value="{{ old('nome', $produto->nome) }}">
            @error('nome')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="preco" class="block text-gray-700">Preço</label>
            <input type="number" name="preco" id="preco" step="0.01" class="border rounded px-3 py-2 w-full" value="{{ old('preco', $produto->preco) }}">
            @error('preco')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="estoque" class="block text-gray-700">Estoque</label>
            <input type="number" name="estoque" id="estoque" class="border rounded px-3 py-2 w-full" value="{{ old('estoque', $produto->estoque) }}">
            @error('estoque')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="ativo" class="flex items-center">
                <input type="checkbox" name="ativo" id="ativo" value="1" {{ old('ativo', $produto->ativo) ? 'checked' : '' }}>
                <span class="ml-2">Ativo</span>
            </label>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
    </form>
</div>
@endsection