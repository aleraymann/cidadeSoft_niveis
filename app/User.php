<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\model\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
        'name','image', 'email','adm','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){

        //papeis do usuario no sistema
        return $this->belongsToMany(\App\model\Role::class);
    }

    public function hasPermission(Permission $permission){

        //verifica as permissoes/funcoes
        return $this->hasAnyRoles($permission->roles);
    }   

    public function hasAnyRoles($roles){

       if( is_array($roles) || is_object($roles) ){
        return !! $roles->intersect($this->roles)->count();

           /*foreach($roles as $role){
            //var_dump('name', $role->name);
            //return $this->roles->contains('name', $role->name);
            //return $this->hasAnyRoles($role);
            
           }*/
       }
       return $this->roles->contains('name', $roles);

    }

    //empresa em user
  public function empresa()
  {
      return $this->belongsTo('App\model\Empresa', 'Codigo');
  }
}
