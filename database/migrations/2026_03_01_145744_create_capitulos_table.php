<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('capitulos', function (Blueprint $table) {
        $table->id(); // Este será el idcapitulo que usas en canciones
        $table->string('titulo');
        $table->text('descripcion')->nullable(); // Por si quieres añadir un gancho comercial
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
        Schema::dropIfExists('capitulos');
    }
}
