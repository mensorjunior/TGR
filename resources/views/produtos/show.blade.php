@extends('layouts.app')
@section('content')
<div class="p-6">
    <h1>{{ $produto->nome }}</h1>
    <p>Preço: R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
    <p>Estoque: {{ $produto->estoque }}</p>
    <input type="number" id="quantidade" value="1" min="1">
    <button id="add-carrinho" data-produto-id="{{ $produto->id }}">Adicionar ao Carrinho</button>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#add-carrinho').click(function() {
        var produtoId = $(this).data('produto-id');
        var quantidade = $('#quantidade').val();
        $.ajax({
            url: '{{ route("carrinho.add") }}',
            type: 'POST',
            data: { produto_id: produtoId, quantidade: quantidade, _token: '{{ csrf_token() }}' },
            success: function(response) {
                $('#carrinho-contador').text(response.contador);
                alert('Adicionado! Total: R$ ' + response.total);
            },
            error: function(xhr) {
                alert(xhr.responseJSON.error || 'Erro ao adicionar');
            }
        });
    });
</script>
@endpush