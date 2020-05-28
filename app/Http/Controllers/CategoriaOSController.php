<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CategoriaOS;
use Gate;


class CategoriaOSController extends Controller
{
    public function listar( CategoriaOS $categoriaos)
    {  
        $categoriaos = $categoriaos->all();
        $categoriaos = CategoriaOS::paginate(20);
        return view("categoriaos", compact("categoriaos")); 
    }
    public function salvar(Request $dadosFormulario, CategoriaOS $categoriaos, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $categoriaos->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CategoriaOSController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $categoriaos->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("CategoriaOSController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("CategoriaOSController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, CategoriaOS $categoriaos)
    {
            $categoriaos->destroy($Codigo);
    }

    public function editar (CategoriaOS $categoriaos, $id)
    {
        $categoriaos = $categoriaos->find($id);
        if(Gate::denies('view_catOS', $categoriaos)){
            return redirect()->back();
        }
        return view("edit.edit_categoriaos", compact("categoriaos","id"));
    }
}
