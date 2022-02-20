<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoCompra extends Model
{
    use HasFactory;
    protected $table = 'GrupoCompra';

    public function compras()
    {
        return $this->hasMany(Compra::class, 'GrupoCompra', 'id');
    }
}
