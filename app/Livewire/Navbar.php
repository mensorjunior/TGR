<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $carrinhoQuantidade = 0;

    public function mount()
    {
        $this->carrinhoQuantidade = session('carrinho') 
            ? collect(session('carrinho'))->sum('quantidade') 
            : 0;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}