<?php

namespace App\Models;

use App\Models\Capitulo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapituloImagen extends Model
{
    use HasFactory;
    protected $fillable = ['capitulo_id', 'url'];

    public function capitulo()
    {
        return $this->belongsTo(Capitulo::class);
    }
}
