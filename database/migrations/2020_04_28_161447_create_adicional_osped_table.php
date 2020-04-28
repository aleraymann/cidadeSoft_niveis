<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalOspedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicional_osped', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('Cod_item')->default(0);
            $table->string('Cod_Ref', 25);
            $table->string('Descricao',40);
            $table->decimal('Valor',10,2)->default(0.00);
            $table->decimal('Qtd_Alterar',10,4)->default(0.0000);
            $table->integer('Cod_Item_Dev')->default(0);
            $table->string('Cod_Ref_Dev', 25);
            $table->decimal('Qtd_Dev',10,4)->default(0.0000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicional_osped');
    }
}
