<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliforEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clifor_endereco', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->unsignedInteger('Cod_CliFor');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Cod_CliFor')->references('Codigo')->on('clifor')->onDelete('cascade');
            $table->string('CEP',10)->nullable();
            $table->string('Tipo_Endereco',1)->default("A");
            $table->string('Endereco',50)->nullable();
            $table->integer('Numero')->nullable();
            $table->string('Bairro',45)->nullable();
            $table->string('Complemento',60)->nullable();
            $table->string('Ponto_Referencia',60)->nullable();
            $table->integer('Cod_IBGE')->nullable();
            $table->string('Cidade',50)->nullable();
            $table->string('Estado',2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clifor_endereco');
    }
}
