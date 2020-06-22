<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{
    protected $table = "cotacao";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Moeda",
        "Data",
        "Cotacao"
    );
}
