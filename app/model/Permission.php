<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permission";
    public $timestamps = false;

    public function roles()
    {
        //traz funcoes..
        return $this->belongsToMany(\App\model\Role::class);

    }
}
