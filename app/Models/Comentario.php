<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $fillable = [
        'comentario', 'producto_id'
    ];

  
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
