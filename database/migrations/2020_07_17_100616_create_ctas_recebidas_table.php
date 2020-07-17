<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtasRecebidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctas_recebidas', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('Cod_Conta');
            $table->string('Num_Doc')->nullable();
            $table->string('Parcela')->nullable();
            $table->integer('Cod_Clifor')->nullable();
            $table->integer('Forma_Pag')->nullable();
            $table->integer('Cond_Pag')->nullable();
            $table->date('Data_Pagto')->nullable();
            $table->date('Data_Baixa')->nullable();
            $table->string('Tipo_Pag')->nullable();
            $table->decimal('Valor_Origem',10,2)->default(0.00)->nullable();
            $table->decimal('Valor_Pago',10,2)->default(0.00)->nullable();
            $table->decimal('Valor_Divida',10,2)->default(0.00)->nullable();
            $table->decimal('Multa',10,2)->default(0.00)->nullable();
            $table->decimal('Desconto',10,2)->default(0.00)->nullable();
            $table->decimal('Juros',10,2)->default(0.00)->nullable();
            $table->string('Origem')->nullable();
            $table->string('Local_Pag')->nullable();
            $table->string('Num_DocCxBco')->nullable();
            $table->string('Observacoes')->nullable();
            $table->integer('Recibo')->nullable();
            $table->integer('Plano_Ctas')->nullable();
            $table->integer('Centro_Custo')->nullable();
            $table->integer('Empresa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctas_recebidas');
    }
}
