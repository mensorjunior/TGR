<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // Apenas usuários autenticados
    }

    public function rules(): array
    {
        return [
            // Validações, se necessário (ex.: itens do carrinho)
        ];
    }
}