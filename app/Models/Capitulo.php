<?php

namespace App\Models;

use App\Models\Obras;
use App\Models\CapituloImagen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;
    
    protected $fillable = ['obra_id', 'numero', 'titulo'];

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

    public function imagenes()
    {
        return $this->hasMany(CapituloImagen::class)->orderBy('created_at', 'desc');
    }
}
