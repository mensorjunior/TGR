<?php
namespace App\Http\Controllers;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('produtos.index'); // Para listagem, que usa Livewire
    }

    public function show($slug)
    {
        $produto = Produto::where('slug', $slug)->firstOrFail();
        return view('produtos.show', compact('produto'));
    }
}