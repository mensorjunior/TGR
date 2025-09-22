<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'user_id', 'total', 'status'];

    protected static function booted()
    {
        static::creating(function ($pedido) {
            if (empty($pedido->codigo)) {
                $pedido->codigo = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(PedidoItem::class);
    }
}