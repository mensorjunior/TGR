<?php
namespace App\Http\Controllers;
use App\Http\Requests\AddCarrinhoRequest;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function add(AddCarrinhoRequest $request)
    {
        $produto = Produto::findOrFail($request->produto_id);
        if ($produto->estoque < $request->quantidade) {
            return response()->json(['error' => 'Estoque insuficiente'], 400);
        }

        $carrinho = session()->get('carrinho', []);
        $key = $produto->id;
        if (isset($carrinho[$key])) {
            $carrinho[$key]['quantidade'] += $request->quantidade;
        } else {
            $carrinho[$key] = [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'quantidade' => $request->quantidade,
            ];
        }
        session()->put('carrinho', $carrinho);

        $total = collect($carrinho)->sum(fn($item) => $item['preco'] * $item['quantidade']);
        $contador = collect($carrinho)->sum('quantidade');

        return response()->json(['total' => $total, 'contador' => $contador]);
    }

    // Método para visualizar carrinho (para uma view futura)
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    public function fechar(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $carrinho = session()->get('carrinho', []);
        if (empty($carrinho)) {
            return redirect()->back()->with('error', 'Carrinho vazio');
        }

        $pedido = Pedido::create([
            'user_id' => auth()->id(),
            'total' => 0,
            'status' => 'pendente',
        ]);

        foreach ($carrinho as $item) {
            $produto = Produto::find($item['id']);
            if ($produto->estoque < $item['quantidade']) {
                $pedido->delete();
                return redirect()->back()->with('error', 'Estoque insuficiente para ' . $item['nome']);
            }

            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $item['id'],
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $item['preco'],
            ]);
        }

        $pedido->calcularTotal();
        session()->forget('carrinho');

        return redirect()->route('pedidos.show', $pedido->codigo)->with('success', 'Pedido criado!');
    }
}