<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\DataContaMovimento;
use App\model\CliFor;
use App\model\ContaCadastro;
use App\model\CentroCusto;
use App\model\Empresa;
use App\model\ContaMovimento;
use Gate;

class DataContaMovimentoController extends Controller
{
    public function listar( DataContaMovimento $data_movimento)
    
    {  
        $data_movimento = $data_movimento->all();
        $clifor = CliFor::all();
        $conta = ContaCadastro::all();
        $custo = CentroCusto::all();
        $empresa = Empresa::all();
        return view('movimento',compact('data_movimento','clifor','conta','custo','empresa'));
       
    }
    public function salvar(Request $dadosFormulario,DataContaMovimento $data_movimento, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $data_movimento->find($id);
                $dados->update($data_movimento->all());
                return redirect()
                ->action("DataContaMovimentoController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $data_movimento->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("DataContaMovimentoController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("DataContaMovimentoController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }
    public function visualizar(DataContaMovimento $data_movimento, $id)
    {
        $data_movimento = DataContaMovimento::find($id);
        if(Gate::denies('view_data_movimento', $data_movimento)){
            return redirect()->back();
        }
        $conta = ContaMovimento::all();
        return view("visual.view_data_movimento", compact("data_movimento","id","conta"));
    }

    public function destroy($Codigo,DataContaMovimento $data_movimento)
    {
        $data_movimento->destroy($Codigo);
    }
}
