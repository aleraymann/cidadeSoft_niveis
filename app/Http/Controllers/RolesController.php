<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Role;
use App\model\Permission;
use Gate;

class RolesController extends Controller
{
    private $role;
    
    public function __construct(Role $role){
        $this->role = $role;
    }

    public function index(){
        
        if(Gate::denies('view_users')){
            return redirect()->back();
        }
        $totpermissions = Permission::all();
        $roles = $this->role->paginate(10);
        return view('roles', compact('roles', 'totpermissions'));
     }

     public function permissions($id){
        $role = $this->role->find($id);
        
        //recuperar permissinos
        $permissions = $role->permissions;

        return view('roles_permissions', compact('role', 'permissions'));
     }

     public function salvar(Request $dadosFormulario,Role $role, $id = null)
     {
        //dd($dadosFormulario);
         try
         {
             if($id > 0)
             {
                 $dados = $role->find($id);
                 $dados->update($dadosFormulario->all());
                 return redirect()
                 ->action("RolesController@index")
                 ->with("toast_success", "Registro Editado Com Sucesso");
             }
             else
             {
                 $role->create($dadosFormulario->all());
             }
             
             return redirect()
             ->action("RolesController@index")
             ->with("toast_success", "Registro Gravado Com Sucesso");
         } 
         catch (\Illuminate\Database\QueryException $e) 
         {
             //dd($e);
             return redirect()
             ->action("RolesController@index")
             ->with("toast_error", "Houve um erro ao gravar o registro");
         }
     }
     public function excluir($Codigo,Role $role)
    {
            $role->destroy($Codigo);
    }
}
