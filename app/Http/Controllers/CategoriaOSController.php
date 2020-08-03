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
        $criterio = "";
        return view("categoriaos", compact("categoriaos","criterio")); 
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

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $categoriaos = CategoriaOS::where( 'Descricao' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        return view("categoriaos", compact("categoriaos","criterio")); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }


    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $categoriaos = CategoriaOS::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        return view("categoriaos", compact("categoriaos","criterio")); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }

}
