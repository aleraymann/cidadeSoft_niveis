<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\AjusteItem;
use App\model\AjusteEstoque;
use Gate;

class AjusteItemController extends Controller
{
   

    public function salvar(Request $dadosFormulario, AjusteItem $ajuste_item, $id = null)
    {
        //dd($dadosFormulario);
        try {
            if ($id > 0) {
                $dados = $ajuste_item->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("AjusteEstoqueController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            } else {

                $ajuste_item->create($dadosFormulario->all());
            }
            
            return redirect(url()->previous())
            ->with("toast_success", "Registro Gravado Com Sucesso");

        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return redirect(url()->previous())
        ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo,  AjusteItem $ajuste_item)
    {
        $ajuste_item->destroy($Codigo);
    }

    public function editar (  AjusteItem $ajuste_item, $id)
    {
        $ajuste_item = $ajuste_item->find($id);
        if(Gate::denies('view_ajuste_item', $ajuste_item)){
            return redirect()->back();
        }
        return view("edit.edit_ajuste_item", compact("ajuste_item","id"));
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        
        $ajuste_item = AjusteItem::where( 'Cod_Item' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("busca_ajuste_item", compact("ajuste_item","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
       
        $ajuste_item = AjusteItem::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("busca_ajuste_item", compact("ajuste_item","criterio")); 
    }
    public function busca( Request $request){
        $criterio  = $request->criterio;
        $ajuste_item = AjusteItem::where( 'Cod_Ref' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("busca_ajuste_item", compact("ajuste_item","criterio")); 
    }
}
