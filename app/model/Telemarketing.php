<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Telemarketing extends Model
{
    protected $table = "telemarketing";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_CliFor',
        'Data',
        'Assunto',
        'Agendou_Visita',
        'Agendou_Servico',
        'Agendou_Atendimento',
        'Cod_Func',
        'Data_Conclusao',
        'Concluso',
    );
}
