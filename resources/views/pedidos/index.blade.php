@extends('layouts.app')
@section('content')
<table>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->codigo }}</td>
            <td>{{ $pedido->status }}</td>
            @if(auth()->user()->isAdmin() && $pedido->status == 'pendente')
                <form action="{{ route('pedidos.updateStatus', $pedido->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pago">
                    <button type="submit">Marcar como Pago</button>
                </form>
            @endif
        </tr>
    @endforeach
</table>
@endsection