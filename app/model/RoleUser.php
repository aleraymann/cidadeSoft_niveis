<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = "role_user";
    public $timestamps = false;
    protected $fillable = Array(
        "role_id",
        "user_id",
    );

    //role em role_user
  public function cod_role()
  {
      return $this->belongsTo('App\model\Role', 'id');
  }
}
