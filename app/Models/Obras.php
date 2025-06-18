<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obras extends Model
{
    //no se si haya que poner un foreign key aca
    protected $fillable = ['nombre','autor','portada','fecha_creacion','descripcion','estado'];
    use HasFactory;

    public function usuarios(){
        return $this->belongsTo(Usuarios::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Obras::class);
    }
}
