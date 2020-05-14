<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\model\PermissionRole;
use App\model\Role;
use App\model\Permission;
use Gate;

class PermissionRoleController extends Controller
{
    public function index(Permisson $permission, Role $role){
        $permission = Permission::all();
        $role = Role::all();
    return view('roles', compact('role','permission'));
     } 

     public function listar(PermissionRole $permission_role){
        $permission_role = PermissionRole::paginate(10);
        if(Gate::denies('view_users', $permission_role)){
            return redirect()->back();
        }
        return view('ger_permissions', compact('permission_role'));
     } 
    public function salvar(Request $dadosFormulario, PermissionRole $permission_role, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
                $dados = $permission_role->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("RolesController@index")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $permission_role->create($dadosFormulario->all());
               //dd($dadosFormulario);
            }
            
            return redirect()
            ->action("RolesController@index")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("RolesController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo,PermissionRole $permission_role)
    {
            $permission_role->destroy($Codigo);
    }
}
