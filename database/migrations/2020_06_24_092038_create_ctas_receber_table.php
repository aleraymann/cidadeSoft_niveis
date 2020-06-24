<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtasReceberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctas_receber', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('Sel')->default(0);
            $table->string('Num_Doc');
            $table->string('Parcela');
            $table->integer('Cod_Clifor');
            $table->integer('Forma_Pag');
            $table->integer('Cond_Pag');
            $table->date('Data_Entrada');
            $table->date('Vencimento');
            $table->date('Data_Juros');
            $table->decimal('Valor_Origem',10,2)->default(0.00);
            $table->decimal('Valor_Divida',10,2)->default(0.00);
            $table->decimal('Multa',10,2)->default(0.00);
            $table->decimal('Taxa_Juros',3,2)->default(0.00);
            $table->decimal('Desconto',10,2)->default(0.00);
            $table->decimal('Juros',10,2)->default(0.00);
            $table->decimal('Divida_Estimada',10,2)->default(0.00);

            $table->string('Origem')->nullable();
            $table->string('Local_Pag')->nullable();
            $table->string('Observacoes')->nullable();
            $table->integer('Cod_Boleto')->nullable();
            $table->string('Nosso_Numero')->nullable();
            $table->string('Linha_Digitavel')->nullable();

            $table->integer('NF')->nullable();
            $table->integer('Credito')->default(0);
            $table->integer('Transacao');
            $table->integer('Plano_Ctas')->nullable();
            $table->integer('Centro_Custo');
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
        Schema::dropIfExists('ctas_receber');
    }
}
