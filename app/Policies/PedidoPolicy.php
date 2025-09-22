<?php

namespace App\Policies;

use App\Models\Pedido;
use App\Models\User;

class PedidoPolicy
{
    public function view(User $user, Pedido $pedido): bool
    {
        return $user->id === $pedido->user_id || $user->isAdmin();
    }

    public function update(User $user, Pedido $pedido): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Pedido $pedido): bool
    {
        return $user->isAdmin();
    }
}