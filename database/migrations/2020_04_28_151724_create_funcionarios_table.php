<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Nome',45);
            $table->string('CPF',14)->nullable();
            $table->string('RG',14)->nullable();
            $table->string('CEP',9)->nullable();
            $table->string('Endereco',60)->nullable();
            $table->string('Bairro',35)->nullable();
            $table->string('Cidade',45)->nullable();
            $table->string('Estado',2)->nullable();
            $table->string('Telefone',13)->nullable();
            $table->string('Celular',13)->nullable();
            $table->string('Email',50)->nullable();
            $table->string('Usuario',45);
            $table->string('Senha',15)->nullable();
            $table->decimal('ComiVend', 3,2)->default(0.00);
            $table->decimal('ComiServ', 3,2)->default(0.00);
            $table->decimal('LimDescPV', 3,2)->default(0.00);
            $table->decimal('LimDescPP', 3,2)->default(0.00);
            $table->integer('idmsgs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
