<?php


namespace App\model;
use Illuminate\Database\Eloquent\Model;



class Funcionario extends Model
{
    protected $table = "funcionario";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Nome",
        "CPF",
        "RG",
        "CEP",
        "Endereco",
        "Bairro",
        "Cidade",
        "Estado",
        "Telefone",
        "Celular",
        "Email",
        "Usuario",
        "Senha",
        "ComiVend",
        "ComiServ",
        "LimDescPV",
        "LimDescPP",
        "idmsgs"
    );
    //funcionario-empresa
    public function cod_empresa()
    {
        return $this->belongsTo(' App\model\Empresa');
    }
    
   
    public function vendedor()
    {
        return $this->hasMany(' App\model\CliFor', 'Cod_funcionario');
    }
    
    
}
