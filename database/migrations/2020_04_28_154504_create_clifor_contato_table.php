<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliforContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clifor_contato', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->unsignedInteger('Cod_CliFor');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Tipo',10);
            $table->string('Setor',10);
            $table->string('Nome',45);
            $table->string('Data_Nasc');
            $table->string('RG',15);
            $table->string('CPF',18);
            $table->string('Celular',14);
            $table->string('Email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clifor_contato');
    }
}
