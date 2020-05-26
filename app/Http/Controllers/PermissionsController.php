<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permission;
use App\model\Role;
use Gate;

class PermissionsController extends Controller
{
    private $permission;
    
    public function __construct(Permission $permission){
        $this->permission = $permission;
        
       
    }

    public function index(){
        if(Gate::denies('view_users')){
            return redirect()->back();
        }
        $permissions = Permission::paginate(10);
        $totpermissions = Permission::all();
        $roles = Role::all();
        return view('permissions', compact('permissions','roles','totpermissions'));
     }

     public function roles($id){
        $permission = $this->permission->find($id);
        
        //recuperar permissinos
        $roles = $permission->roles;

        return view('permissions_roles', compact('roles', 'permission'));
     }

     public function salvar(Request $dadosFormulario,Permission $permission, $id = null)
     {
        //dd($dadosFormulario);
         try
         {
             if($id > 0)
             {
                 $dados = $permission->find($id);
                 $dados->update($dadosFormulario->all());
                 return redirect()
                 ->action("PermissionsController@index")
                 ->with("toast_success", "Registro Editado Com Sucesso");
             }
             else
             {
                 $permission->create($dadosFormulario->all());
             }
             
             return redirect()
             ->action("PermissionsController@index")
             ->with("toast_success", "Registro Gravado Com Sucesso");
         } 
         catch (\Illuminate\Database\QueryException $e) 
         {
             //dd($e);
             return redirect()
             ->action("PermissionsController@index")
             ->with("toast_error", "Houve um erro ao gravar o registro");
         }
     }
     public function excluir($Codigo,Permission $permission)
    {
            $permission->destroy($Codigo);
    }
}
