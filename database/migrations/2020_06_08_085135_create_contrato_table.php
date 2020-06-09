<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('Cod_CliFor')->default(0);
            $table->integer('Dia_Venc')->default(0);
            $table->integer('Parceria')->default(0);
            $table->string('Parceiro')->nullable();
            $table->decimal('Perc_Comissao',3,2);
            $table->date('Data');
            $table->string('Tipo_Cob')->nullable();
            $table->integer('Convenio')->default(0);
            $table->decimal('Valor',10,2)->default(0.00);
            $table->string('Observacoes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato');
    }
}
