<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;

class ProdutosList extends Component
{
    public $search = '';
    public $somenteAtivos = true;

    public function render()
    {
        $produtos = Produto::query()
            ->when($this->search, fn($q) => $q->where('nome', 'like', "%{$this->search}%"))
            ->when($this->somenteAtivos, fn($q) => $q->where('ativo', true))
            ->get();
        return view('livewire.produtos-list', compact('produtos'));
    }
}