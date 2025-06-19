<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public function obras(){
        return $this->belongsToMany(Obra::class, 'obra_tag', 'tags_id', 'obras_id');
    }
}
