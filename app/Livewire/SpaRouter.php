<?php
namespace App\Livewire;

use Livewire\Component;

class SpaRouter extends Component
{
    public $route = 'produtos'; 

    protected $listeners = [
        'navigate' => 'setRoute'
    ];

    public function setRoute($route)
    {
        $this->route = $route;
    }

    public function render()
    {
        return view('livewire.spa-router');
    }
}