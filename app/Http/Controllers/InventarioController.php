<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\Inventario;
use App\model\InventarioItem;

use Gate;

class InventarioController extends Controller
{
    public function listar( Inventario $inventario)
    
    {  
        $inventario = $inventario->all();
        $criterio = "";
        return view('inventario',compact('inventario',"criterio"));
       
    }
    public function salvar(Request $dadosFormulario, Inventario $inventario, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $inventario->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("InventarioController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $inventario->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("InventarioController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("InventarioController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }

    public function editar(Inventario $inventario, $id)
    {
        $inventario = $inventario->find($id);
        if(Gate::denies('view_inventario',$inventario)){
            return redirect()->back();
        }
        return view("edit.edit_inventario", compact("inventario","id"));
    }

    public function visualizar(Inventario $inventario, $id)
    {
        $inventario = Inventario::find($id);
        if(Gate::denies('view_inventario', $inventario)){
            return redirect()->back();
        }
        $inventario_item = InventarioItem::all();
        $criterio="";
        return view("visual.view_inventario", compact("inventario","id", "inventario_item","criterio"));
    }


    public function excluir($Codigo, Inventario $inventario)
    {
        $inventario->destroy($Codigo);
    }


    public function busca3( Request $request){
        $criterio  = $request->criterio;
       
        $inventario = Inventario::where( 'Responsavel' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("inventario", compact("inventario","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
       
        $inventario = Inventario::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("inventario", compact("inventario","criterio")); 
    }
    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
     
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $inventario = Inventario::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("inventario", compact("inventario","criterio")); 
    }
}
