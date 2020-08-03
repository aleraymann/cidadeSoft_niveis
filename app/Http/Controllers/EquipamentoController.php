<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Equipamento;
use App\model\CliFor;

use Gate;

class EquipamentoController extends Controller
{
    public function listar( Equipamento $equipamento)
    {  
        $equipamento = $equipamento->all();
        $equipamento = Equipamento::paginate(10);
        $clifor = CliFor::all();
        $criterio = "";
        return view("equipamento", compact("equipamento","clifor","criterio")); 
    }

    public function store(Request $request, Equipamento $equipamento)
    {
        //dd($request->Foto);
        try {
            $data = $request->all();
            //dd($data);
                if ($request->hasFile('Foto') && $request->file('Foto')->isValid()) {
                $name = ($request->Nro_Serie).kebab_case($request->Equipamento); //uniqid(date('HisYmd')); // Define um novo nome data atual (nunca dar nome duplicado e sobrescrever)
                $extension = $request->Foto->extension(); // Recupera a extensão do arquivo
                $nameFile = "{$name}.{$extension}"; // Define finalmente o nome
                
                //local
                $upload = $request->Foto->storeAs('equipamentos', $nameFile); // Faz o upload:

                 /*
            //hospedagem
             $upload = $request->Logo;
                $destinationPath = public_path('../../public_html/cidadesoft/storage/equipamentos');
                $upload->move($destinationPath, $nameFile); // Faz o upload:
            */
                $data['Foto'] = $nameFile; // coloca no array q vc vai criar

                    if (!$upload) { // SE NAO FIZER O UPLOAD PARA O STORAGE
                        return redirect()
                    ->action("EquipamentoController@listar")
                    ->with("toast_error", "Houve um erro ao gravar o Imagem");
                    }
                }
            
                 $equipamento->create($data);
                 return redirect()
                ->action("EquipamentoController@listar")
                ->with("toast_success", "Registro Gravado Com Sucesso");
        }
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("EquipamentoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function update(Request $request, Equipamento $equipamento, $id)
    {
        //dd($request->Logo);
        try {
            $dados = $equipamento->find($id);
            $data = $request->all();
            
        if ($request->hasFile('Foto') && $request->file('Foto')->isValid()) { // existe imagem nova
                        
            $name = ($request->Nro_Serie).kebab_case($request->Equipamento);//uniqid(date('HisYmd')); // Define um novo nome data atual (nunca dar nome duplicado e sobrescrever)
            $extension = $request->Foto->extension(); // Recupera a extensão do arquivo
            $nameFile = "{$name}.{$extension}"; // Define finalmente o nome
            
            //local
            $upload = $request->Foto->storeAs('equipamentos', $nameFile); // Faz o upload:

            /*
            //hospedagem
             $upload = $request->Logo;
                $destinationPath = public_path('../../public_html/cidadesoft/storage/equipamentos');
                $upload->move($destinationPath, $nameFile); // Faz o upload:
            */

            $data['Foto'] = $nameFile; 
            if (!$upload) { // SE NAO FIZER O UPLOAD PARA O STORANGE
              return redirect()
                ->action("EquipamentoController@listar")
                ->with("toast_error", "Houve um erro ao gravar o Imagem");
            }

        }else{// se cair aqui, continua a imagem q estava no banco já 
            $data['Foto'] = $request->LogoBanco;  
        }
        //dd($data); // Confere os dados que estaram passando para o update

         $equipamento->find($id)->update($data); // grava todos os conteudos automativo

            return redirect() // SE CHEGOU AQUI, DADOS ATUALIZADOS COM SUCESSO
            ->action("EquipamentoController@listar")
            ->with("toast_success", "Registro Editado Com Sucesso");
                
            
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return redirect()
            ->action("EquipamentoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    } 


        public function edit(Equipamento $equipamento, $id)
    {
        //return 'update';
        $equipamento = Equipamento::find($id);
        if(Gate::denies('view_equipamento', $equipamento)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        return view("edit.edit_equipamento", compact("equipamento","id","clifor"));
    }

    public function view(Equipamento $equipamento, $id)
    {
        $equipamento = Equipamento::find($id);
        if(Gate::denies('view_equipamento', $equipamento)){
            return redirect()->back();
        }
        return view("visual.view_equipamentos", compact("equipamento","id"));
    }

    public function destroy($Codigo, Equipamento $equipamento)
    {
        $equipamento->destroy($Codigo);
    }

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $equipamento = Equipamento::where( 'Equipamento' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        $clifor = CliFor::all();
        return view("equipamento", compact("equipamento","clifor","criterio")); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }


    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $equipamento = Equipamento::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        $clifor = CliFor::all();
        return view("equipamento", compact("equipamento","clifor","criterio")); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }


}
