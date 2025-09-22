<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AppLayout extends Component
{
    public $carrinhoQuantidade = 0;

    public function mount()
    {
        $this->atualizarCarrinho();
    }

    public function atualizarCarrinho()
    {
        $this->carrinhoQuantidade = session('carrinho')
            ? collect(session('carrinho'))->sum('quantidade')
            : 0;
    }

    protected $listeners = ['carrinhoAtualizado' => 'atualizarCarrinho'];

    public function render()
    {
        return view('livewire.app-layout');
    }
}