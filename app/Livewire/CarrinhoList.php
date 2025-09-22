<?php
namespace App\Livewire;

use Livewire\Component;

class CarrinhoList extends Component
{
    public $carrinho;

    public function mount()
    {
        $this->carrinho = session('carrinho', []);
    }

    public function render()
    {
        return view('livewire.carrinho-list');
    }

    public function fecharPedido()
    {
        if (!auth()->check()) {
            session()->flash('error', 'Faça login para fechar o pedido.');
            return;
        }

        $this->emit('navigate', 'pedidos'); // após fechar, redireciona para pedidos
        \App\Http\Controllers\CarrinhoController::fechar(request());
        $this->carrinho = []; // limpa carrinho local
    }
}