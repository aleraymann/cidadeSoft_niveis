<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Recibo;
use App\model\CliFor;
use App\model\Empresa;
use Gate;

class ReciboController extends Controller
{
    public function listar(Recibo $recibo)
    {
        $recibo = $recibo->all();
        $recibo = Recibo::paginate(20);
        $clifor = CliFor::all();
        $clifor1 = CliFor::all();
        $empresa = Empresa::all();
        $criterio = "";
        return view("recibo", compact("recibo","clifor","empresa","clifor1","criterio"));
    }

    public function salvar(Request $dadosFormulario,Recibo $recibo, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $recibo->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ReciboController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $recibo->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ReciboController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("ReciboController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function destroy($Codigo,Recibo $recibo)
    {
            $recibo->destroy($Codigo);
    }

    public function editar(Recibo $recibo, $id)
    {
        $recibo = $recibo->find($id);
        if(Gate::denies('view_recibo',$recibo)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $clifor1 = CliFor::all();
        $empresa = Empresa::all();

        return view("edit.edit_recibo", compact("recibo","id","clifor","empresa","clifor1"));
    }

    public function visualizar(Recibo $recibo, $id)
    {
        $recibo = Recibo::find($id);
        if(Gate::denies('view_recibo', $recibo)){
            return redirect()->back();
        }
        return view("visual.view_recibo", compact("recibo","id"));
    }

    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "pagamento de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $clifor = CliFor::all();
        $clifor1 = CliFor::all();
        $empresa = Empresa::all();
        $recibo = Recibo::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("recibo", compact("recibo","clifor","empresa","clifor1","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $clifor1 = CliFor::all();
        $empresa = Empresa::all();
        $recibo = Recibo::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("recibo", compact("recibo","clifor","empresa","clifor1","criterio")); 
    }

    public function busca3( Request $request){
        if( $request->criterio == "P"){
            $criterio  = "Pago";
        }else{
            $criterio  = "Recebido";
        }
      
        //dd($request->criterio);
        $clifor = CliFor::all();
        $clifor1 = CliFor::all();
        $empresa = Empresa::all();
        $recibo = Recibo::where( 'Pag_Rec' , '=', $request->criterio)->paginate(10);
        return view("recibo", compact("recibo","clifor","empresa","clifor1","criterio")); 
    }
}
