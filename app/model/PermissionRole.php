<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = "permission_role";
    public $timestamps = false;
    protected $fillable = Array(
        "permission_id",
        "role_id",
    );

 
    //role em permission_role
    public function cod_role()
    {
        return $this->belongsTo('App\model\Role', 'id');
    }
}
