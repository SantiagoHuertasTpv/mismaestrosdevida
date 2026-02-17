<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->string('email');
        $table->string('nombre')->nullable();
        $table->string('telefono')->nullable();

        $table->string('direccion');
        $table->string('ciudad');
        $table->string('provincia')->nullable();
        $table->string('cp', 10);
        $table->string('pais')->default('España');

        $table->unsignedInteger('cantidad')->default(1);
        $table->text('nota')->nullable();

        $table->string('estado')->default('pendiente'); // pendiente, gestionado, enviado, cancelado
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
        Schema::dropIfExists('pedidos');
    }
}
