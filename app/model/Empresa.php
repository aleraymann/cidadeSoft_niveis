<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Nome_Fantasia",
        "Razao_Social",
        "CEP",
        "Endereco",
        "Numero",
        "Bairro",
        "Cod_IBGE",
        "Cidade",
        "Estado",
        "Telefone",
        "Celular",
        "FAX",
        "Email",
        "IM",
        "IE",
        "CNPJ",
        "Logo",
        "Site",
        "Atividade",
        "CNAE",
        "CliFor_Saida",
        "CliFor_Entrada",
        "Cfg_DataUltExec",
        "Cfg_Ultbackup",
        "Cfg_DirRel",
        "Cfg_PreviewRel",
        "Cfg_ImpOrcamento",
        "Cfg_ImpPedido",
        "Cfg_ImpOs",
        "Cfg_ImpNfe",
        "Cfg_ImpEtiq",
        "Cfg_ImpEtiqMod",
        "Cfg_TranSeq",
        "Cfg_LembCliAniv",
        "Cfg_PesqCep",
        "Cfg_DirFotoProd",
        "Cfg_IdentChamada",
        "Cfg_AtuPrecoPrazo",
        "Cfg_PermDuplicar",
        "SMTP_CorpoEmail",
        "SMTP_Serv",
        "SMTP_Porta",
        "SMTP_Usuario",
        "SMTP_Senha",
        "SMTP_Seguro",
        "SMTP_SSL",
        "SMTP_EmailCopia",
        "WS_Plataforma",
        "WB_Endereco",
        "WS_WSDL",
        "WS_Usuario",
        "WS_Senha",
        "FTP_Endereco",
        "FTP_Porta",
        "FTP_Usuario",
        "FTP_Senha",
        "Fin_CFixo",
        "Fin_Desloc",
        "Fin_Comissao",
        "Fin_Inad",
        "Fin_Lucro",
        "Fin_DescPV",
        "Fin_PerDano",
        "Fin_JurosPadrao",
        "Fin_MsgPadrao",
        "Fin_ControlaCaixa",
        "Fin_MultaPadrao",
        "Fin_ForImposto",
        "Fin_ComiFrac",
        "Fin_ContrComi",
        "Fisc_Tributacao",
        "Fisc_ICMS",
        "Fisc_PIS",
        "Fisc_COFINS",
        "Fisc_ISSQN",
        "Fisc_IRPJ",
        "Fisc_CSLL",
        "Fisc_Simples",
        "Fisc_CFOP",
        "Fisc_ICMSFixo",
        "NFe_CertDig",
        "NFe_WebServ",
        "NFe_Ambiente",
        "NFe_Proxy",
        "NFe_Porta",
        "NFe_Usuario",
        "NFe_Senha",
        "NFe_DirXML",
        "NFe_FormaEmiss",
        "NFe_Serie",
        "NFe_Modelo",
        "NFe_Versao",
        "NFe_Orient",
        "NFe_Valida",
        "NFe_Obs",
        "NFCe_Ambiente",
        "NFCe_Serie",
        "NFCe_Modelo",
        "NFCe_Versao",
        "NFCe_idToken",
        "NFCe_CSC",
        "Ctb_Email",
        "Ctb_ContNome",
        "Ctb_ContCRC",
        "Ctb_ContINSS",
        "Ctb_contCPF",
        "Ctb_ContFone",
        "Ctb_RegLocal",   
        "Ctb_RegNumero",
        "Ctb_RegData",
        "Vend_PedSimp",
        "Vend_CliForPadrao",
        "Vend_CondPadrao",
        "Vend_FormPadrao",
        "Vend_DescAdicOrca",
        "Vend_DescAdicPed",
        "Vend_DescAdicOS",
        "Vend_AltPrTot",
        "Vend_ExibeEst",
        "Vend_AgrupaltPed",
        "Vend_FreteIncorp",
        "Vend_BxEstOSOrc",
        "Vend_DiasLocacao",
        "Vend_MudaStatOS",
        "Vend_BuscObs",
        "Vend_ProgFide",
        "Vend_ProgPtos",
        "Vend_TranspPadrao",
        "Vend_FiltroIniMes",
        "Vend_VlrHora",
        "Vend_VlrMinimo"
    );
  //empresa em clifor
    public function cod_empresa()
    {
        return $this->belongsTo('App\model\CliFor');
    }
    
    //empresa em user
    public function cod_empresa2()
    {
        return $this->belongsTo('App\model\User');
    }

  //transportadora em empresa
  public function transportadora()
  {
      return $this->belongsTo('App\model\Transportadora', 'Codigo');
  }
  //cond_pag em empresa
  public function cond_pag()
  {
    return $this->belongsTo('App\model\Cond_Pag', 'Codigo');
  }

  //form_pag em empresa
  public function form_pag()
  {
    return $this->belongsTo('App\model\Form_Pag', 'Codigo');
  }

  //empresa em transportadora
  public function transp()
  {
    return $this->belongsTo('App\model\Transportadora');
  }



  //empresa em boleto
  public function boleto()
  {
    return $this->belongsTo('App\model\BoletoTitulo');
  }

  public function conta_cadastro()
    {
        return $this->hasMany('App\model\ContaCadastro' );
    }


    public function clifor() {
        return $this->hasMany('App\model\CliFor');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\model\Funcionario');
    }
    
    public function cod_conta_saldo()
    {
        return $this->hasMany(' App\model\ContaSaldo', 'Cod_empresa');
    }
}