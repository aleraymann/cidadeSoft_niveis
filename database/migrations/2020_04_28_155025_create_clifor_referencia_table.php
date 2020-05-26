<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliforReferenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clifor_referencia', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->unsignedInteger('Cod_CliFor');
            $table->foreign('Cod_CliFor')->references('Codigo')->on('clifor')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Loja_Banco',45)->nullable();
            $table->string('Conta',15)->nullable();
            $table->string('Telefone',15)->nullable();
            $table->string('Ult_Compra')->nullable();
            $table->decimal('Valor_UltCompra', 10,2)->default(0.00);
            $table->decimal('Limite', 10,2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clifor_referencia');
    }
}
