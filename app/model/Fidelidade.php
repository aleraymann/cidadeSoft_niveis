<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fidelidade extends Model
{
    protected $table = "fidelidade";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Cod_CliFor",
        "Venda",
        "Valor",
        "Pontos",
        "Pedidos",
        "Data",
        "Usado",
    );
}
