<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Meus Pedidos</h2>
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Código</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td class="border p-2">{{ $pedido->codigo }}</td>
                    <td class="border p-2">{{ $pedido->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
