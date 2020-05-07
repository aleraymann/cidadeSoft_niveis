<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportadoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportadora', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Fis_Jur',1)->default("J");
            $table->string('Razao_Social',60);
            $table->string('Nome_Fantasia',60);
            $table->string('Endereco',45);
            $table->string('Bairro',60);
            $table->string('Cidade',45);
            $table->string('Estado',2);
            $table->string('CEP',9);
            $table->string('Telefone',14);
            $table->string('Celular',14);
            $table->string('Comercial',14);
            $table->string('Email');
            $table->string('RG',14)->nullable();
            $table->string('CPF',14)->nullable();
            $table->string('IE',14);
            $table->string('CNPJ',18)->nullable();
            $table->string('Tipo_Frete',10);
            $table->decimal('FreteM2',10,2)->default(0.00);
            $table->decimal('FreteM3',10,2)->default(0.00);
            $table->string('FretePor',10);
            $table->decimal('FreteM',10,2)->default(0.00);
            $table->integer('Empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportadora');
    }
}
