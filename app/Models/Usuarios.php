<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Obras;

class Usuarios extends Model
{
    use HasFactory;
    protected $fillable = ['apodo', 'contraseña', 'genero','creado_en','foto_perfil','fondo_perfil','rol'];
    public function obras(){
        return $this->hasMany(Obra::class, 'usuarios_id');
    }

}
