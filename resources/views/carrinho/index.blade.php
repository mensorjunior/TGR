@extends('layouts.app')

@section('content')
<div class="p-6">
    @foreach($carrinho as $item)
        <p>{{ $item['nome'] }} - Qtd: {{ $item['quantidade'] }} - R$ {{ $item['preco'] }}</p>
    @endforeach
    <form action="{{ route('carrinho.fechar') }}" method="POST">
        @csrf
        <button type="submit">Fechar Pedido</button>
    </form>
</div>
@endsection