<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class PedidosList extends Component
{
    public $pedidos;

    public function mount()
    {
        $user = auth()->user();
        $this->pedidos = $user->isAdmin() ? Pedido::all() : $user->pedidos;
    }

    public function render()
    {
        return view('livewire.pedidos-list');
    }
}