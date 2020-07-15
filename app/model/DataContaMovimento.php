<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DataContaMovimento extends Model
{
    protected $table = "data_conta_movimento";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Num_caixa",
        "Turno",
        "Data",
    );
}
