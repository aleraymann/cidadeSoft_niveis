<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\RoleUser;
use App\model\Role;
use Gate;

class RoleUserController extends Controller
{

    public function index(RoleUser $role_user){
        if(Gate::denies('view_users')){
            return redirect()->back();
        }
        $role_users  = RoleUser::paginate(10);
        return view("role_users", compact("role_users"));
    }

    public function salvar(Request $dadosFormulario, RoleUser $role_user, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
                $dados = $role_user->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("UsersController@index")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $role_user->create($dadosFormulario->all());
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

    public function excluir($Codigo,RoleUser $role_user)
    {
        $role_user->destroy($Codigo);
    }

}
