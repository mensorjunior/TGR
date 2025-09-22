<?php
namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidoConfirmado;

class PedidoController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $pedidos = Pedido::all();
        } else {
            $pedidos = auth()->user()->pedidos;
        }
        return view('pedidos.index', compact('pedidos'));
    }

    public function show($codigo)
    {
        $pedido = Pedido::where('codigo', $codigo)->firstOrFail();
        $this->authorize('view', $pedido); // Verifica se o usuário pode ver este pedido
        return view('pedidos.show', compact('pedido'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->status = $request->status;
        if ($request->status === 'pago') {
            foreach ($pedido->items as $item) {
                $produto = $item->produto;
                if ($produto->estoque < $item->quantidade) {
                    return back()->with('error', 'Estoque insuficiente');
                }
                $produto->estoque -= $item->quantidade;
                $produto->save();
            }
            // Envia email
            Mail::to($pedido->user->email)->send(new PedidoConfirmado($pedido));
        }
        $pedido->save();
        return back()->with('success', 'Status atualizado');
    }
}