<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Role;

class RolesController extends Controller
{
    private $role;
    
    public function __construct(Role $role){
        $this->role = $role;
    }

    public function index(){
        $roles = $this->role->all();
        return view('roles', compact('roles'));
     }

     public function permissions($id){
        $role = $this->role->find($id);
        
        //recuperar permissinos
        $permissions = $role->permissions;

        return view('roles_permissions', compact('role', 'permissions'));
     }
}
