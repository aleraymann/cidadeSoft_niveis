<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Empresa;
use App\model\Funcionario;
use App\model\Transportadora;
use App\model\CliFor;

use PDF;

class PDFController extends Controller
{
    public function gerar_empresas(){
        $empresas = Empresa::all();
        //dd($empresas);

        $empresas = PDF::loadView('pdf.pdf_empresas',compact('empresas'));
        return $empresas->setPaper('a4')->stream('Empresas.pdf');
    }

    public function gerar_funcionarios(){
        $funcionarios = Funcionario::all();
        $funcionarios = PDF::loadView('pdf.pdf_funcionarios',compact('funcionarios'));
        return $funcionarios->setPaper('a4')->stream('Funcionarios.pdf');
    }

    public function gerar_clifor(){
        $clifor = CliFor::all();
        $clifor = PDF::loadView('pdf.pdf_clifor',compact('clifor'));
        return $clifor->setPaper('a4')->stream('Clientes_Fornecedores.pdf');
    }
    public function gerar_transportadoras(){
        $transportadora = Transportadora::all();
        $transportadora = PDF::loadView('pdf.pdf_transportadoras',compact('transportadora'));
        return $transportadora->setPaper('a4')->stream('Transportadoras.pdf');
    }
}
