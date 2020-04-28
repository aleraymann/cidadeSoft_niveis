<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    public $timestamps = false;

    public function permissions(){
        return $this->belongsToMany(\App\model\Permission::class);
    }
}
