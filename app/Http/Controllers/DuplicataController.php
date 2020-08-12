<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Duplicata;
use App\model\CliFor;
use App\model\Empresa;
use App\model\BoletoTitulo;
use Gate;

class DuplicataController extends Controller
{
    public function listar(Duplicata $duplicata)
    {  
        $duplicata = $duplicata->all();
        $duplicata = Duplicata::paginate(20);
        $clifor = CliFor::all();
        $boleto = BoletoTitulo::all();
        $empresa = Empresa::all();
        $criterio = "";
        return view("duplicata", compact("duplicata","empresa","boleto","clifor","criterio"));
    }

    public function salvar(Request $dadosFormulario,  Duplicata $duplicata, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $duplicata->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("DuplicataController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $duplicata->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("DuplicataController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("DuplicataController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo,  Duplicata $duplicata)
    {
        $duplicata->destroy($Codigo);
    }

    public function editar (  Duplicata $duplicata, $id)
    {
        $duplicata = $duplicata->find($id);
        if(Gate::denies('view_duplicata', $duplicata)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $boleto = BoletoTitulo::all();
        $empresa = Empresa::all();
        return view("edit.edit_duplicata", compact("duplicata","id","clifor","boleto","empresa"));
    }

    public function visualizar(Duplicata $duplicata, $id)
    {
        $duplicata = $duplicata->find($id);
         if(Gate::denies('view_duplicata', $duplicata)){
            return redirect()->back();
        }
        return view("visual.view_duplicata", compact("duplicata","id"));
    }

    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $clifor = CliFor::all();
        $boleto = BoletoTitulo::all();
        $empresa = Empresa::all();
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $duplicata = Duplicata::whereBetween( 'Vencimento' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("duplicata", compact("duplicata","clifor","boleto","empresa","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $boleto = BoletoTitulo::all();
        $empresa = Empresa::all();
        $duplicata = Duplicata::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("duplicata", compact("duplicata","clifor","boleto","empresa","criterio")); 
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $boleto = BoletoTitulo::all();
        $empresa = Empresa::all();
        $duplicata = Duplicata::where( 'Cod_CliFor' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("duplicata", compact("duplicata","clifor","boleto","empresa","criterio")); 
    }
    public function busca4( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $boleto = BoletoTitulo::all();
        $empresa = Empresa::all();
        $duplicata = Duplicata::where( 'Cod_Boleto' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("duplicata", compact("duplicata","clifor","boleto","empresa","criterio")); 
    }
}
