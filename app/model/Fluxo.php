<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fluxo extends Model
{
    protected $table = "conta_fluxo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Cod_Conta",
        "Data",
        "Saldo",
        "Empresa",
    );
}
