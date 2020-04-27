<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            
            $table->increments('Codigo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Razao_Social', 60)->nullable();
            $table->string('Nome_Fantasia',60)->nullable();
            $table->string('CEP', 9)->nullable();
            $table->string('Endereco', 45)->nullable();
            $table->integer('Numero')->nullable()->unsigned();
            $table->string('Bairro', 35)->nullable();
            $table->integer('Cod_IBGE')->nullable()->unsigned();
            $table->string('Cidade', 42)->nullable();
            $table->string('Estado', 2)->nullable();
            $table->string('Telefone', 13)->nullable();
            $table->string('Celular', 13)->nullable();
            $table->string('FAX', 13)->nullable();
            $table->string('Email')->nullable();
            $table->string('IM', 14)->nullable();
            $table->string('IE', 13)->nullable();
            $table->string('CNPJ', 18)->nullable();
            $table->string('Logo', 13)->nullable();
            $table->string('Site', 13)->nullable();
            $table->string('Atividade', 20)->nullable();
            $table->integer('CNAE')->nullable();
            $table->integer('CliFor_Saida')->nullable();
            $table->integer('CliFor_Entrada')->nullable();
            $table->date('Cfg_DataUltExec')->nullable();
            $table->date('Cfg_Ultbackup')->nullable();
            $table->string('Cfg_DirRel')->nullable();
            $table->integer('Cfg_PreviewRel',)->default(1);
            $table->string('Cfg_ImpOrcamento', 20)->nullable();
            $table->string('Cfg_ImpPedido', 20)->nullable();
            $table->string('Cfg_ImpOs', 20)->nullable();
            $table->string('Cfg_ImpNfe', 20)->nullable();
            $table->string('Cfg_ImpEtiq', 20)->nullable();
            $table->string('Cfg_ImpEtiqMod', 20)->nullable();
            $table->integer('Cfg_TranSeq')->nullable()->unsigned();
            $table->integer('Cfg_LembCliAniv')->default(0);
            $table->integer('Cfg_PesqCep')->default(0);
            $table->string('Cfg_DirFotoProd')->nullable();
            $table->integer('Cfg_IdentChamada')->default(0);
            $table->integer('Cfg_AtuPrecoPrazo')->default(1);
            $table->integer('Cfg_PermDuplicar')->default(1);
            $table->string('SMTP_CorpoEmail')->nullable();
            $table->string('SMTP_Serv', 50)->nullable();
            $table->integer('SMTP_Porta')->nullable();
            $table->string('SMTP_Usuario', 45)->nullable();
            $table->string('SMTP_Senha', 45)->nullable();
            $table->integer('SMTP_Seguro')->default(1);
            $table->string('SMTP_SSL', 3)->default("TLS");
            $table->integer('SMTP_EmailCopia')->default(1);
            $table->string('WS_Plataforma', 15)->nullable();
            $table->string('WB_Endereco')->nullable();
            $table->string('WS_WSDL')->nullable();
            $table->string('WS_Usuario',50)->nullable();
            $table->string('WS_Senha',50)->nullable();
            $table->string('FTP_Endereco')->nullable();
            $table->integer('FTP_Porta')->nullable();
            $table->string('FTP_Usuario',50)->nullable();
            $table->string('FTP_Senha',80)->nullable();
            $table->decimal('Fin_CFixo', 3,2)->nullable()->default(0.00);
            $table->decimal('Fin_Desloc', 3,2)->nullable()->default(0.00);
            $table->decimal('Fin_Comissao', 3,2)->nullable()->default(0.00);
            $table->decimal('Fin_Lucro', 3,2)->nullable()->default(0.00);
            $table->decimal('Fin_Inad', 3,2)->nullable()->default(0.00);
            $table->decimal('Fin_DescPV', 3,2)->nullable()->default(0.00);
            $table->decimal('Fin_PerDano', 3,2)->nullable()->default(0.00);
            $table->decimal('Fin_JurosPadrao', 3,2)->nullable()->default(0.00);
            $table->string('Fin_MsgPadrao',50)->nullable();
            $table->integer('Fin_ControlaCaixa')->default(1);
            $table->decimal('Fin_MultaPadrao', 3,2)->nullable()->default(0.00);
            $table->integer('Fin_ForImposto')->default(0);
            $table->integer('Fin_ComiFrac')->default(0);
            $table->integer('Fin_ContrComi')->default(0);
            $table->string('Fisc_Tributacao',20)->nullable();
            $table->decimal('Fisc_ICMS', 3,2)->nullable()->default(0.00);
            $table->decimal('Fisc_PIS', 3,2)->nullable()->default(0.00);
            $table->decimal('Fisc_COFINS', 3,2)->nullable()->default(0.00);
            $table->decimal('Fisc_ISSQN', 3,2)->nullable()->default(0.00);
            $table->decimal('Fisc_IRPJ', 3,2)->nullable()->default(0.00);
            $table->decimal('Fisc_CSLL', 3,2)->nullable()->default(0.00);
            $table->decimal('Fisc_Simples', 3,2)->nullable()->default(0.00);
            $table->integer('Fisc_CFOP')->default(0);
            $table->integer('Fisc_ICMSFixo')->default(0);
            $table->string('NFe_CertDig',45)->nullable();
            $table->string('NFe_WebServ',2)->nullable()->default("PR");
            $table->integer('NFe_Ambiente')->default(2);
            $table->string('NFe_Proxy')->nullable();
            $table->integer('NFe_Porta')->nullable();
            $table->string('NFe_Usuario',50)->nullable();
            $table->string('NFe_Senha',50)->nullable();
            $table->string('NFe_DirXML')->nullable();
            $table->string('NFe_FormaEmiss',10)->nullable();
            $table->string('NFe_Serie')->default(1);
            $table->string('NFe_Modelo')->nullable()->default(55);
            $table->string('NFe_Versao',4)->nullable()->default(3.10);
            $table->string('NFe_Orient')->nullable();
            $table->integer('NFe_Valida')->default(1);
            $table->string('NFe_Obs',50)->nullable();
            $table->integer('NFCe_Ambiente')->default(2);
            $table->string('NFCe_Serie',3)->nullable()->default(3.10);
            $table->string('NFCe_Modelo',3)->nullable()->default(65);
            $table->string('NFCe_Versao')->nullable()->default(3.10);
            $table->string('NFCe_idToken')->nullable();
            $table->string('NFCe_CSC')->nullable();
            $table->string('Ctb_Email',60)->nullable();
            $table->string('Ctb_ContNome',60)->nullable();
            $table->string('Ctb_ContCRC',25)->nullable();
            $table->string('Ctb_ContINSS',25)->nullable();
            $table->string('Ctb_contCPF',14)->nullable();
            $table->string('Ctb_ContFone',13)->nullable();
            $table->string('Ctb_RegLocal')->nullable();
            $table->string('Ctb_RegNumero')->nullable();
            $table->date('Ctb_RegData')->nullable();
            $table->integer('Vend_PedSimp')->default(1);
            $table->integer('Vend_CliForPadrao')->nullable();
            $table->integer('Vend_CondPadrao')->nullable();
            $table->integer('Vend_FormPadrao')->nullable();
            $table->string('Vend_DescAdicOrca')->nullable();
            $table->string('Vend_DescAdicPed')->nullable();
            $table->string('Vend_DescAdicOS')->nullable();
            $table->integer('Vend_AltPrTot')->default(0);
            $table->integer('Vend_ExibeEst')->default(0);
            $table->integer('Vend_AgrupaltPed')->default(0);
            $table->integer('Vend_FreteIncorp')->default(1);
            $table->integer('Vend_BxEstOSOrc')->default(1);
            $table->integer('Vend_DiasLocacao')->nullable()->unsigned();
            $table->integer('Vend_MudaStatOS')->default(1);
            $table->integer('Vend_BuscObs')->default(1);
            $table->integer('Vend_ProgFide')->default(0);
            $table->decimal('Vend_ProgPtos', 10,2)->nullable()->default(0.00);
            $table->integer('Vend_TranspPadrao')->nullable();
            $table->integer('Vend_FiltroIniMes')->default(1);
            $table->decimal('Vend_VlrHora', 10,2)->nullable()->default(0.00);
            $table->decimal('Vend_VlrMinimo', 10,2)->nullable()->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
