<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportadoraDestinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportadora_destino', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->unsignedInteger('Cod_Transp');
            $table->foreign('Cod_Transp')->references('Codigo')->on('transportadora')->onDelete('cascade');
            $table->string('Destino_Cidade',50);
            $table->string('Destino_UF',2);
            $table->decimal('Indice',3,2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportadora_destino');
    }
}
