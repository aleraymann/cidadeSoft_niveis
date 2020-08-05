<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\BoletoTitulo;
use App\model\ContaCadastro;
use App\model\CliFor;
use App\model\BoletoRemessa;
use App\model\Empresa;
use App\model\ContasReceber;
use Gate;


class BoletoTituloController extends Controller
{
    public function listar( BoletoTitulo $boleto_titulo, ContaCadastro $conta, CliFor $clifor, 
    BoletoRemessa $boleto_remessa, Empresa $empresa)
    {  
        $boleto_titulo = $boleto_titulo->all();
        $boleto_titulo = BoletoTitulo::paginate(20);
        $conta = ContaCadastro::all();
        $clifor = CliFor::all();
        $boleto_remessa = BoletoRemessa::all();
        $empresa = Empresa::all();
        $ctas_receber = ContasReceber::all();
        $criterio = "";
        return view("boleto_titulo", compact("boleto_titulo","conta","clifor","boleto_remessa","empresa", "ctas_receber","criterio")); 
    }
    public function salvar(Request $dadosFormulario, BoletoTitulo $boleto_titulo, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $boleto_titulo->find($id);
                //dd($dadosFormulario->Sel);
                if($dadosFormulario['Sel'] == "1"){
                    $dadosFormulario['Sel'] = $dadosFormulario['Sel']; 
                } else{ 
                    $dadosFormulario['Sel'] = 0;
                }
                //dd($dadosFormulario['Sel']);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("BoletoTituloController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $boleto_titulo->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("BoletoTituloController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("BoletoTituloController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, BoletoTitulo $boleto_titulo)
    {
            $boleto_titulo->destroy($Codigo);
    }
       
    public function editar ( BoletoTitulo $boleto_titulo, $id,ContaCadastro $conta, CliFor $clifor, 
    BoletoRemessa $boleto_remessa, Empresa $empresa)
    {
        $boleto_titulo = $boleto_titulo->find($id);
        if(Gate::denies('view_boletoTit', $boleto_titulo)){
            return redirect()->back();
        }
        $conta = ContaCadastro::all();
        $clifor = CliFor::all();
        $boleto_remessa = BoletoRemessa::all();
        $empresa = Empresa::all();
        $ctas_receber = ContasReceber::all();
        return view("edit.edit_boleto_titulo", compact("boleto_titulo","id","conta","clifor","boleto_remessa","empresa","ctas_receber"));
    }
    public function vizualizar(BoletoTitulo $boleto_titulo, $id)
    {
        $boleto_titulo = $boleto_titulo->find($id);
         if(Gate::denies('view_boletoTit', $boleto_titulo)){
            return redirect()->back();
        }
        return view("visual.view_boleto_titulo", compact("boleto_titulo","id"));
    }

    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $conta = ContaCadastro::all();
        $clifor = CliFor::all();
        $boleto_remessa = BoletoRemessa::all();
        $empresa = Empresa::all();
        $ctas_receber = ContasReceber::all();
        $boleto_titulo = BoletoTitulo::whereBetween( 'Data_Doc' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("boleto_titulo", compact("boleto_titulo","conta","clifor","boleto_remessa","empresa", "ctas_receber","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $conta = ContaCadastro::all();
        $clifor = CliFor::all();
        $boleto_remessa = BoletoRemessa::all();
        $empresa = Empresa::all();
        $ctas_receber = ContasReceber::all();
        $boleto_titulo = BoletoTitulo::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("boleto_titulo", compact("boleto_titulo","conta","clifor","boleto_remessa","empresa", "ctas_receber","criterio")); 
    }

    public function busca3( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "vencimento de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $conta = ContaCadastro::all();
        $clifor = CliFor::all();
        $boleto_remessa = BoletoRemessa::all();
        $empresa = Empresa::all();
        $ctas_receber = ContasReceber::all();
        $boleto_titulo = BoletoTitulo::whereBetween( 'Vencimento' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("boleto_titulo", compact("boleto_titulo","conta","clifor","boleto_remessa","empresa", "ctas_receber","criterio")); 
    }
    
}
