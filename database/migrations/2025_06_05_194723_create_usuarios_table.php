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
            $table->enum('genero',['Masculino','Femenino','Otro'])->default('Otro');
            $table->string('foto_perfil',100)->default('usuario');;
            $table->string('fondo_perfil',100)->default('usuario');;
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
