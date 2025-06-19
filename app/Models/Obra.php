<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    //no se si haya que poner un foreign key aca
    protected $fillable = ['usuarios_id','nombre','autor','portada','fecha_creacion','fecha_finalizacion','descripcion','estado'];
    use HasFactory;

    public function usuarios(){
        return $this->belongsTo(Usuarios::class, 'usuarios_id');
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class, 'obra_tag', 'obras_id', 'tags_id');
    }

    public function capitulos()
    {
        return $this->hasMany(Capitulo::class);
    }
}
