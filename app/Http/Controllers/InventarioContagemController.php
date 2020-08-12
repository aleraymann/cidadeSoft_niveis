<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\InventarioContagem;
use Gate;

class InventarioContagemController extends Controller
{
    public function listar(InventarioContagem $inventario_contagem)
    {  
        $inventario_contagem = $inventario_contagem->all();
        $inventario_contagem = InventarioContagem::paginate(20);
        $criterio = "";
        return view("inventario_contagem", compact("inventario_contagem","criterio"));
    }

    public function salvar(Request $dadosFormulario,  InventarioContagem $inventario_contagem, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $inventario_contagem->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("InventarioContagemController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $inventario_contagem->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("InventarioContagemController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("InventarioContagemController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, InventarioContagem $inventario_contagem)
    {
        $inventario_contagem->destroy($Codigo);
    }

    public function editar (  InventarioContagem $inventario_contagem, $id)
    {
        $inventario_contagem = $inventario_contagem->find($id);
        if(Gate::denies('view_invent_cont', $inventario_contagem)){
            return redirect()->back();
        }
        return view("edit.edit_inventario_contagem", compact("inventario_contagem","id"));
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $inventario_contagem = InventarioContagem::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("inventario_contagem", compact("inventario_contagem","criterio")); 
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;
        $inventario_contagem = InventarioContagem::where( 'Responsavel' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("inventario_contagem", compact("inventario_contagem","criterio")); 
    }

}
