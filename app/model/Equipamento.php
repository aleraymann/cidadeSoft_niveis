<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = "equipamento";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_CliFor',
        'Nro_Serie',
        'Placa',
        'Equipamento',
        'Marca',
        'Modelo',
        'Nro_Frota',
        'Fabricacao',
        'Combustivel',
        'Acessorios',
        'Estado',
        'Foto',
    );
}
