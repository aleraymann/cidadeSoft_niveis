<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNcmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncm', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('NCM');
            $table->string('Descricao');
            $table->decimal('AliqIBPT',3,2)->default(0.00);
            $table->decimal('AliqImp',3,2)->default(0.00);
            $table->decimal('AliqEst',3,2)->default(0.00)->nullable();
            $table->decimal('AliqMun',3,2)->default(0.00)->nullable();
            $table->integer('Ex');
            $table->integer('Tipo')->nullable();
            $table->string('VigenciaIni')->nullable();
            $table->string('VigenciaFim')->nullable();
            $table->string('Versao',6);
            $table->string('Chave',6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ncm');
    }
}
