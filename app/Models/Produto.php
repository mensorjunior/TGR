<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'slug', 'preco', 'estoque', 'ativo'];

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = $value;

        $slug = Str::slug($value);
        $original = $slug;
        $i = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $i++;
        }

        $this->attributes['slug'] = $slug;
    }

    // Verificar depois.
    public function calcularTotal()
    {
        $this->total = $this->items->sum(function ($item) {
            return $item->quantidade * $item->preco_unitario;
        });
        $this->save();
    }
}