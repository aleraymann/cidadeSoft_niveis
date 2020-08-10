<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Telemarketing;
use App\model\CliFor;
use Gate;

class TelemarketingController extends Controller
{
    public function listar(Telemarketing $telemarketing)
    {
        $telemarketing = $telemarketing->all();
        $telemarketing = Telemarketing::paginate(20);
        $clifor = CliFor::all();
        $criterio = "";
        return view("telemarketing", compact("telemarketing","clifor","criterio"));
    }

    public function store(Request $dadosFormulario,Telemarketing $telemarketing, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $telemarketing->find($id);

                if($dadosFormulario['Agendou_Visita'] == "1"){
                    $dados['Agendou_Visita'] = $dados['Agendou_Visita']; 
                } else{ 
                    $dados['Agendou_Visita'] = 0;
                }
                if($dadosFormulario['Agendou_Servico'] == "1"){
                    $dados['Agendou_Servico'] = $dados['Agendou_Servico']; 
                } else{ 
                    $dados['Agendou_Servico'] = 0;
                }
                if($dadosFormulario['Agendou_Atendimento'] == "1"){
                    $dados['Agendou_Atendimento'] = $dados['Agendou_Atendimento']; 
                } else{ 
                    $dados['Agendou_Atendimento'] = 0;
                }
                if($dadosFormulario['Concluso'] == "1"){
                    $dados['Concluso'] = $dados['Concluso']; 
                } else{ 
                    $dados['Concluso'] = 0;
                }


                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("TelemarketingController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $telemarketing->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("TelemarketingController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("TelemarketingController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }

    public function edit(Telemarketing $telemarketing, $id)
    {
        $telemarketing = $telemarketing->find($id);
        if(Gate::denies('view_telemarketing',$telemarketing)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        return view("edit.edit_telemarketing", compact("telemarketing","id","clifor"));
    }
    public function destroy($Codigo, Telemarketing $telemarketing)
    {
        $telemarketing->destroy($Codigo);

    }
    public function view(Telemarketing $telemarketing,  $id)
    {
        
        $telemarketing = $telemarketing->find($id);
        if(Gate::denies('view_telemarketing', $telemarketing)){
            return redirect()->back();
        }
        return view("visual.view_telemarketing", compact("telemarketing","id"));
    }

   
    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $clifor = CliFor::all();
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $telemarketing = Telemarketing::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("telemarketing", compact("telemarketing","clifor","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $telemarketing = Telemarketing::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("telemarketing", compact("telemarketing","clifor","criterio")); 
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $telemarketing = Telemarketing::where( 'Cod_Func' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("telemarketing", compact("telemarketing","clifor","criterio")); 
    }
    public function busca4( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        if( $request->criterio == "1"){
            $criterio  = "Concluído";
        }else if( $request->criterio == "0"){
            $criterio  = "Não Concluído";
        }
        $telemarketing = Telemarketing::where( 'Concluso' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("telemarketing", compact("telemarketing","clifor","criterio")); 
    }
   
}
