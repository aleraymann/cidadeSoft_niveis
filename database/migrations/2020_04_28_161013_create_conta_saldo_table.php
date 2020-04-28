<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaSaldoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_saldo', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->string('Data');
            $table->integer('Turno')->default(1);
            $table->integer('Cod_Fun');
            $table->decimal('Saldo_Inicial',10,2)->default(0.00);
            $table->decimal('Total_Ent',10,2)->default(0.00);
            $table->decimal('Total_Sai',10,2)->default(0.00);
            $table->decimal('Saldo_Final',10,2)->default(0.00);
            $table->decimal('Total_Dinheiro',10,2)->default(0.00);
            $table->decimal('Total_Cheque',10,2)->default(0.00);
            $table->decimal('Total_Cartao',10,2)->default(0.00);
            $table->decimal('Total_Duplicata',10,2)->default(0.00);
            $table->string('Situacao',1)->default("A");
            $table->unsignedInteger('Cod_Conta');
            $table->foreign('Cod_Conta')->references('Codigo')->on('conta_cadastro')->onDelete('cascade');
            $table->integer('Empresa')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conta_saldo');
    }
}
