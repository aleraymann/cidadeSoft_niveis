<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliforTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clifor', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Class_ABC',1)->default("A");
            $table->string('Tip',1)->default("C");
            $table->integer('Ativo')->default(1);
            $table->date('Data_Cadastro');
            $table->string('Fis_Jur',1)->default("F");
            $table->string('Razao_Social');
            $table->string('Nome_Fantasia')->nullable();
            $table->date('Data_Nascimento')->nullable();
            $table->string('Estado_Civil',1)->nullable();
            $table->string('Sexo',1)->nullable();
            $table->string('CNPJ',18)->nullable();
            $table->string('IE',14)->nullable();
            $table->string('IEST',14)->nullable();
            $table->string('IM',10)->nullable();
            $table->string('CPF',14)->nullable();
            $table->string('RG',14)->nullable();
            $table->string('Telefone',13)->nullable();
            $table->string('Operadora1',5)->nullable();
            $table->string('Celular',13)->nullable();
            $table->string('Operadora2',5)->nullable();
            $table->string('Comercial',13)->nullable();
            $table->string('Operadora3',5)->nullable();
            $table->string('Email',50)->nullable();
            $table->string('Site')->nullable();
            $table->integer('Cli_Atacado')->default(0);
            $table->string('Perfil',10)->nullable();
            $table->string('Profissao',25)->nullable();
            $table->string('SitFinanc',1)->default("L");
            $table->decimal('LimiCred', 10,2)->default(0.00)->nullable();
            $table->decimal('PercDescAcresc', 3,2)->default(0.00)->nullable();
            $table->unsignedInteger('Vendedor');
            $table->foreign('Vendedor')->references('Codigo')->on('funcionario')->onDelete('cascade');
            $table->string('Local_UltMov',3)->nullable();
            $table->date('Data_UltMov')->nullable();
            $table->string('Observacoes')->nullable();
            $table->string('Aviso')->nullable();
            $table->integer('Empresa')->default(1)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clifor');
    }
}
