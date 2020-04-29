<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Funcionario;

class UsersController extends Controller
{
    private $user;
    
    public function __construct(user $user){
        $this->user = $user;
    }

    public function index(){
        $users = $this->user->all();
        return view('users', compact('users'));
     }

     public function roles($id){
        $user = $this->user->find($id);
        
        //recuperar permissinos
        $roles = $user->roles;

        return view('users_roles', compact('roles', 'user'));
     }
}
