<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaCadastroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_cadastro', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Descricao', 45);
            $table->integer('Cod_Banco')->default(0);
            $table->integer('Dig_Banco')->default(0);
            $table->string('Nome_Banco', 20);
            $table->integer('Dig_Banco_Cob')->default(0);
            $table->string('Praca', 50);
            $table->integer('Cod_Age')->default(0);
            $table->integer('Dig_Age')->default(0);
            $table->integer('CC')->default(0);
            $table->integer('Digito')->default(0);
            $table->string('Tipo_Conta', 1)->default("C");
            $table->string('Tipo_Cobranca', 15)->nullable();
            $table->string('Cod_Cedente', 15)->nullable();
            $table->string('Convenio', 15)->nullable();
            $table->string('Carteira', 2)->nullable();
            $table->integer('Uso_Bco')->nullable();
            $table->integer('Cod_Moeda')->default(9);
            $table->string('Especie', 2)->default("R$");
            $table->string('Especie_Doc', 2)->default("DM");
            $table->string('Aceite', 1)->default("N");
            $table->string('Local_Pgto',60)->default("PAGAVEL EM QUALQUER BANCO ATE O VENCIMENTO");
            $table->integer('Dias_Desc')->default(0)->nullable();
            $table->decimal('Perc_Desc', 3, 2)->default(0.00)->nullable();
            $table->decimal('Perc_Multa', 3, 2)->default(0.00)->nullable();
            $table->decimal('Perc_Juros', 3, 2)->default(0.00)->nullable();
            $table->integer('Dias_AvisoProt')->default(0)->nullable();
            $table->integer('Dias_Prot')->default(0)->nullable();
            $table->decimal('Tx_Emissao', 3, 2)->default(0.00)->nullable();
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
        Schema::dropIfExists('conta_cadastro');
    }
}
