<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinFormpagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_formapag', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Descricao',45);
            $table->decimal('Comi_Operad',3,2)->default(0.00);
            $table->decimal('Tx_Antecip',3,2)->default(0.00);
            $table->string('Tipo')->default("DI");
            $table->string('Destino')->default("CX");
            $table->integer('Dest_CliFor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fin_formapag');
    }
}
