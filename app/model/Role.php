<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    public $timestamps = false;
    protected $fillable = Array(
        "name",
        "label",
    );

    public function permissions(){
        return $this->belongsToMany(\App\model\Permission::class);
    }

     //role em role_user
     public function cod_role()
     {
         return $this->belongsTo('App\model\RoleUser');
     }
      //role em permission_role
      public function cod_roles()
      {
          return $this->belongsTo('App\model\PermissionRole');
      }
 
}
