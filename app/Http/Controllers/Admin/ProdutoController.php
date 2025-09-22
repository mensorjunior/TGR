<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Lista todos os produtos (admin).
     */
    public function index()
    {
        $this->authorize('viewAny', Produto::class); // Verifica permissão para listar
        $produtos = Produto::all();
        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * Exibe formulário para criar novo produto.
     */
    public function create()
    {
        $this->authorize('create', Produto::class); // Verifica permissão para criar
        return view('admin.produtos.create');
    }

    /**
     * Salva um novo produto.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Produto::class); // Verifica permissão
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'ativo' => 'boolean',
        ]);

        // O slug é gerado automaticamente na model Produto via setNomeAttribute
        Produto::create($validated);
        return redirect()->route('admin.produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Exibe formulário para editar um produto.
     */
    public function edit(Produto $produto)
    {
        $this->authorize('update', $produto); // Verifica permissão
        return view('admin.produtos.edit', compact('produto'));
    }

    /**
     * Atualiza um produto.
     */
    public function update(Request $request, Produto $produto)
    {
        $this->authorize('update', $produto); // Verifica permissão
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'ativo' => 'boolean',
        ]);

        $produto->update($validated);
        return redirect()->route('admin.produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Exclui um produto.
     */
    public function destroy(Produto $produto)
    {
        $this->authorize('delete', $produto); // Verifica permissão
        $produto->delete();
        return redirect()->route('admin.produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}