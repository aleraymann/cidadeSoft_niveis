<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Role;
use App\model\Funcionario;
use Gate;

class UsersController extends Controller
{
    private $user;
    
    public function __construct(user $user){
        $this->user = $user; 
    }

    public function index(){
        if(Gate::denies('view_users')){
            return redirect()->back();
        }

        $role = Role::all();
        $users = $this->user->all();
        return view('users', compact('users','role'));
     }

     public function roles($id){
        if(Gate::denies('view_users')){
            return redirect()->back();
        }
        $user = $this->user->find($id);
        //recuperar permissinos
        $roles = $user->roles;
        return view('users_roles', compact('roles', 'user'));
     }

     public function excluir($Codigo,User $user)
     {
        if(Gate::denies('view_users')){
            return redirect()->back();
        }
         $user->destroy($Codigo);
     }

     public function editar(User $user, $id)
    {
        if(Gate::denies('view_users')){
            return redirect()->back();
        }
        $user = $user->find($id);
        return view("edit.edit_users", compact("user","id"));
    }

    public function salvar(Request $dadosFormulario, User $user, $id = null)
    {
        try
        {
            if($id > 0)
            {   
                 if(Gate::denies('view_users')){
                return redirect()->back();
                }
                
                $dados = $user->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("UsersController@index")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $user->create($dadosFormulario->all());
               //dd($dadosFormulario);
            }
            
            return redirect()
            ->action("UsersController@index")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("EmpresaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
 
}
