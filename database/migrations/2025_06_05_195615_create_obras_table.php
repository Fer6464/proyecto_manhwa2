<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relacion uno a muchos de usuario y obras
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuarios_id')->constrained()->onDelete('cascade');
            $table->string('nombre',250)->unique();   
            $table->string('autor',60);
            $table->string('portada',100);
            $table->time('fecha_creacion');
            $table->time('fecha_finalizacion');
            $table->text('descripcion');
            $table->enum('estado',['En emisión','Finalizado','En Hiatus','Cancelado'])->default('En emisión');
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
        Schema::dropIfExists('obras');
    }
}
