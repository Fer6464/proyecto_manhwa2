<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('apodo',50)->unique();
            $table->string('contraseña',50);
            $table->enum('genero',['Masculino','Femenino','Otro'])->default('Otro');
            $table->string('foto_perfil',200)->default('https://i1.sndcdn.com/avatars-nWyUazpEQrlKCFCR-qAc9Pg-t1080x1080.jpg');;
            $table->string('fondo_perfil',200)->default('https://static.wikitide.net/projectsekaiwiki/thumb/e/ed/Bg_area_10.png/1920px-Bg_area_10.png');;
            $table->string('rol',30)->default('usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
