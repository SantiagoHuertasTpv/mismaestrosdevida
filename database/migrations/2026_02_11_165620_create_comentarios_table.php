<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('comentarios', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('tunombre');           // Nombre del usuario
            $table->string('nombremaestro');      // Nombre del maestro
            $table->string('comentario_corto');   // Un resumen o título
            $table->text('comentario_largo');     // El texto completo (usamos text para que quepa mucho contenido)
            $table->timestamps(); // Crea las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
