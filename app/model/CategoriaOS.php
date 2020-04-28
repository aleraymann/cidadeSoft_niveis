<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CategoriaOS extends Model
{
    protected $table = "categoria_osped";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Descricao",
    );
}
