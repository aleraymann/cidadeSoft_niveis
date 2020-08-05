<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\BoletoRemessa;
use App\model\BoletoTitulo;
use App\model\Convenio;
use Gate;

class BoletoRemessaController extends Controller
{
    public function listar( BoletoRemessa $boleto_remessa)
    {  
        $boleto_remessa = $boleto_remessa->all();
        $boleto_remessa = BoletoRemessa::paginate(20);
        $convenio = Convenio::all();
        $criterio = "";
        return view("boleto_remessa", compact("boleto_remessa","convenio","criterio")); 
    }
    public function salvar(Request $dadosFormulario, BoletoRemessa $boleto_remessa, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $boleto_remessa->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("BoletoRemessaController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $boleto_remessa->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("BoletoRemessaController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("BoletoRemessaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, BoletoRemessa $boleto_remessa)
    {
        $boleto_remessa->destroy($Codigo);
      
    }
    
    public function editar (BoletoRemessa $boleto_remessa, $id)
    {
        $boleto_remessa = $boleto_remessa->find($id);

        if(Gate::denies('view_boletoRem', $boleto_remessa)){
            return redirect()->back();
        }
        $convenio = Convenio::all();
        return view("edit.edit_boleto_remessa", compact("boleto_remessa","id","convenio"));
    }
    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $convenio = Convenio::all();
        $boleto_remessa = BoletoRemessa::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("boleto_remessa", compact("boleto_remessa","convenio","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $convenio = Convenio::all();
        $boleto_remessa = BoletoRemessa::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("boleto_remessa", compact("boleto_remessa","convenio", "criterio")); 
    }
}
