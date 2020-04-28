<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletoTituloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleto_titulo', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('Sel')->default(0);
            $table->integer('Cod_Conta')->default(0);
            $table->date('Data_Doc');
            $table->date('Vencimento');
            $table->string('Nro_Doc',14);
            $table->string('Nosso_Num',20);
            $table->decimal('Valor',10,2)->default(0.00);
            $table->string('Msg_1',45)->nullable();
            $table->string('Msg_2',45)->nullable();
            $table->string('Msg_3',45)->nullable();
            $table->integer('Inst_1')->default(0)->nullable();
            $table->integer('Inst_2')->default(0)->nullable();
            $table->decimal('Multa',3,2)->default(0.00);
            $table->decimal('Taxa_Juros',10,2)->default(0.00);
            $table->decimal('Acrescimo',10,2)->default(0.00);
            $table->decimal('Desconto',10,2)->default(0.00);
            $table->integer('Cod_CliFor')->default(0);
            $table->integer('Cod_NF')->default(0)->nullable();
            $table->integer('Cod_CtaRec')->default(0)->nullable();
            $table->date('Data_Bai')->nullable();
            $table->date('Data_Liq')->nullable();
            $table->string('Situacao',1)->default("C");
            $table->integer('Cod_Rem')->default(0)->nullable();
            $table->integer('Transacao')->default(0);
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
        Schema::dropIfExists('boleto_titulo');
    }
}
