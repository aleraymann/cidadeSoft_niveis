<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    protected $table = "recibo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Pag_Rec',
        'Rec_De',
        'Pag_Para',
        'Valor',
        'Referente',
        'Data',
        'Ben_Nome',
        'Ben_End',
        'Ben_CPF_CNPJ',
        'Em_Nome',
        'Em_End',
        'Em_CPF_CNPJ',
        'Transacao',
        'Empresa',
    );
}
