<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaMovimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_movimento', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('Data');
            $table->integer('Especie')->default(0);
            $table->string('Documento')->default("NFF");
            $table->string('Num_Doc');
            $table->integer('Cod_Clifor');
            $table->string('Nome_Clifor');
            $table->string('Historico');
            $table->decimal('Valor',10,2)->default(0.00);
            $table->string('Operador')->default("C");
            $table->integer('Cod_Conta');
            $table->integer('Cod_Conta_Saldo');
            $table->integer('Plano_Ctas');
            $table->integer('Centro_Custo');
            $table->integer('Transacao');
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
        Schema::dropIfExists('conta_movimento');
    }
}
