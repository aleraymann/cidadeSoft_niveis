<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permission;
use Gate;

class PermissionsController extends Controller
{
    private $permission;
    
    public function __construct(Permission $permission){
        $this->permission = $permission;
        
       
    }

    public function index(){
        $permissions = $this->permission->all();
        return view('permissions', compact('permissions'));
     }

     public function roles($id){
        $permission = $this->permission->find($id);
        
        //recuperar permissinos
        $roles = $permission->roles;

        return view('permissions_roles', compact('roles', 'permission'));
     }
}
