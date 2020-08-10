<?php
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Auth\Middleware\Authenticate;

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get("/", function () {
    return view("auth.login");
});

Route::get("/Dashboard", 'HomeController@index')->middleware('auth');

//gerenciar cargos para usuarios
Route::group(["prefix" => "Cargo",'middleware' => 'auth'], function () {
Route::get("/", 'RoleUserController@index');
Route::delete("/excluir/{id}", 'RoleUserController@excluir');
});



//permissões
Route::group(["prefix" => "Permission",'middleware' => 'auth'], function () {
    Route::get("/", 'PermissionsController@index');
    Route::get("/vizualizar/{id}", 'PermissionsController@roles');
    Route::post("/salvar/{id?}", 'PermissionsController@salvar');
    Route::delete("/excluir/{id}", "PermissionsController@excluir");
});

//gerenciar permissoes
Route::get("/Ger_perm",  'PermissionRoleController@listar')->middleware('auth');
Route::delete("/Ger_perm/excluir/{id}",  'PermissionRoleController@excluir')->middleware('auth');
//atribuir permissoes a cargos
Route::post("/Permission_role/salvar/{id?}", 'PermissionRoleController@salvar')->middleware('auth');

//atribuir cargos a usuarios
Route::post("/Role_user/salvar/{id?}", 'RoleUserController@salvar')->middleware('auth');


// crud cargos
Route::group(["prefix" => "Role",'middleware' => 'auth'], function () {
    Route::get("/", 'RolesController@index');
    Route::get("/vizualizar/{id}", 'RolesController@permissions');
    Route::post("/salvar/{id?}", 'RolesController@salvar');
    Route::delete("/excluir/{id}", "RolesController@excluir");
});



// crud users
Route::group(["prefix" => "User",'middleware' => 'auth'], function () {
    Route::get("/", 'UsersController@index');
    Route::get("/vizualizar/{id}", 'UsersController@roles');
    Route::post("/salvar/{id?}", 'UsersController@salvar');
    Route::post("/profile_update", 'UsersController@profileUpdate');
    Route::get("/editar/{id}", "UsersController@editar");
    Route::delete("/excluir/{id}", "UsersController@excluir");
    Route::get("/edit_profile", function () {
        return view('edit.edit_profile');
    });
    Route::get("/profile", function () {
        return view('visual.view_profile');
    });
});

//visualizar mapas
Route::get("/Maps", function () {
    return view('maps');
})->middleware('auth');


//calendario
Route::group(["prefix" => "Calendario",'middleware' => 'auth'], function () {
    Route::get("/", 'CalendarController@index');
    Route::post("/salvar", 'CalendarController@store');
    Route::get("/listar", 'CalendarController@show');
    Route::get("/editar/{id}", "CalendarController@edit");
    Route::post("/update/{id}", 'CalendarController@update');
    Route::delete("/excluir/{id}", "CalendarController@destroy");
});


//rotas cadastros gerais
Route::group(["prefix" => "Cadastro",'middleware' => 'auth'], function () {
    Route::get("/empresas","EmpresaController@listar");
    Route::get("/funcionarios","FuncionarioController@listar");
    Route::get("/Clifor","CliForController@listar");
    Route::get("/cond_pag","Cond_PagController@listar");
    Route::get("/form_pag","Form_PagController@listar");
    Route::get("/transportadoras","TransportadoraController@listar");
    Route::get("/centrocusto","CentroCustoController@listar");
    Route::get("/os_ped","CategoriaOSController@listar");
    Route::get("/conta","ContaCadastroController@listar");
    Route::get("/cest","CESTController@listar");
    Route::get("/ncm","NCMController@listar");
    Route::get("/adicional_osped","Adicional_OSPedController@listar");
    Route::get("/boleto_remessa","BoletoRemessaController@listar");
    Route::get("/boleto_titulo","BoletoTituloController@listar");
    Route::get("/convenio","ConvenioController@listar");
    Route::get("/contrato","ContratoController@listar");
    Route::get("/movimento","DataContaMovimentoController@listar");
    Route::get("/cotacao","CotacaoController@listar");
    Route::get("/ctas_pagar","ContasPagarController@listar");
    Route::get("/ctas_pagas","ContasPagasController@listar");
    Route::get("/ctas_receber","ContasReceberController@listar");
    Route::get("/ctas_recebidas","ContasRecebidasController@listar");
    Route::get("/inventario","InventarioController@listar");
    Route::get("/fluxo","FluxoController@listar");
    Route::get("/fidelidade","FidelidadeController@listar");
    Route::get("/cfop","CFOPController@listar");
    Route::get("/recibo","ReciboController@listar");
    Route::get("/equipamento","EquipamentoController@listar");
    Route::get("/recibo_titulo","ReciboTituloController@listar");
    Route::get("/telemarketing","TelemarketingController@listar");

});

//crud clifor
Route::group(["prefix" => "Clifor", 'middleware' => 'auth'], function () {
    //clifor
    Route::post("/salvar/{id?}", "CliForController@update");
    Route::delete("/excluir/{id}", "CliForController@destroy");
    Route::get("/editar/{id}", "CliForController@edit");
    Route::get("/vizualizar/{id}", "CliForController@view");
    Route::post("/busca", "CliForController@busca");
    Route::post("/busca2", "CliForController@busca2");
    //contato
    Route::get("/contato","CliForContatoController@listar");
    Route::post("/contato/salvar/{id?}","CliForContatoController@update");
    Route::delete("/contato/excluir/{id}", "CliForContatoController@destroy");
    Route::get("/contato/editar/{id}", "CliForContatoController@edit");
    //endereco
    Route::get("/endereco","CliForEnderecoController@listar");
    Route::post("/endereco/salvar/{id?}","CliForEnderecoController@update");
    Route::delete("/endereco/excluir/{id}", "CliForEnderecoController@destroy");
    Route::get("/endereco/editar/{id}", "CliForEnderecoController@edit");
    //referencia
    Route::get("/referencia","CliForReferenciaController@listar");
    Route::post("/referencia/salvar/{id?}","CliForReferenciaController@update");
    Route::delete("/referencia/excluir/{id}", "CliForReferenciaController@destroy");
    Route::get("/referencia/editar/{id}", "CliForReferenciaController@edit");
    
});

//crud funcionario
Route::group(["prefix" => "Funcionario",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "FuncionarioController@update");
    Route::delete("/excluir/{id}", "FuncionarioController@destroy");
    Route::get("/editar/{id}", "FuncionarioController@edit");
    Route::get("/vizualizar/{id}", "FuncionarioController@view");
    Route::post("/busca", "FuncionarioController@busca");
    Route::post("/busca2", "FuncionarioController@busca2");
});

//crud empresa
Route::group(["prefix" => "Empresa", 'middleware' => 'auth'], function () {
    Route::post("/salvar/{id}", "EmpresaController@update");
    Route::post("/salvar", "EmpresaController@store");
    Route::delete("/excluir/{id}", "EmpresaController@destroy");
    Route::get("/editar/{id}", "EmpresaController@edit");
    Route::get("/vizualizar/{id}", "EmpresaController@view");
    Route::post("/busca", "EmpresaController@busca");
    Route::post("/busca2", "EmpresaController@busca2");
});

//crud consicao de pagamento
Route::group(["prefix" => "Condicao",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "Cond_PagController@salvar");
    Route::delete("/excluir/{id}", "Cond_PagController@excluir");
    Route::get("/editar/{id}", "Cond_PagController@editar");
    Route::post("/busca", "Cond_PagController@busca");
    Route::post("/busca2", "Cond_PagController@busca2");
});

//crud forma de pagamento
Route::group(["prefix" => "Forma",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "Form_PagController@salvar");
    Route::delete("/excluir/{id}", "Form_PagController@excluir");
    Route::get("/editar/{id}", "Form_PagController@editar");
    Route::post("/busca", "Form_PagController@busca");
    Route::post("/busca2", "Form_PagController@busca2");
});

//crud transportadora
Route::group(["prefix" => "Transportadora",'middleware' => 'auth'], function () {
    //transportadora
    Route::post("/salvar/{id?}", "TransportadoraController@salvar");
    Route::delete("/excluir/{id}", "TransportadoraController@excluir");
    Route::get("/editar/{id}", "TransportadoraController@editar");
    Route::get("/vizualizar/{id}", "TransportadoraController@vizualizar");
    Route::post("/busca", "TransportadoraController@busca");
    Route::post("/busca2", "TransportadoraController@busca2");
    //destino
    Route::post("/destino/salvar/{id?}","Transportadora_DestinoController@salvar");
    Route::delete("/destino/excluir/{id}", "Transportadora_DestinoController@excluir");
    Route::get("/destino/editar/{id}", "Transportadora_DestinoController@editar");
    //valor
    Route::post("/valor/salvar/{id?}","Transportadora_ValorController@salvar");
    Route::delete("/valor/excluir/{id}", "Transportadora_ValorController@excluir");
    Route::get("/valor/editar/{id}", "Transportadora_ValorController@editar");
});

//crud centro custo
Route::group(["prefix" => "CentroCusto",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CentroCustoController@salvar");
    Route::delete("/excluir/{id}", "CentroCustoController@excluir");  
    Route::get("/editar/{id}", "CentroCustoController@editar");
    Route::post("/busca", "CentroCustoController@busca");
    Route::post("/busca2", "CentroCustoController@busca2");
});

// crud categoria OS
Route::group(["prefix" => "CatOSPed",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CategoriaOSController@salvar");
    Route::delete("/excluir/{id}", "CategoriaOSController@excluir");
    Route::get("/editar/{id}", "CategoriaOSController@editar");
    Route::post("/busca", "CategoriaOSController@busca");
    Route::post("/busca2", "CategoriaOSController@busca2");
});


//crud conta bancaria
Route::group(["prefix" => "Conta",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ContaCadastroController@salvar");
    Route::delete("/excluir/{id}", "ContaCadastroController@excluir");
    Route::get("/editar/{id}", "ContaCadastroController@editar");
    Route::get("/vizualizar/{id}", "ContaCadastroController@vizualizar");
    Route::post("/saldo/salvar/{id?}","ContaSaldoController@salvar");
    Route::delete("/saldo/excluir/{id}", "ContaSaldoController@excluir");
    Route::get("/saldo/editar/{id}", "ContaSaldoController@editar");
    Route::post("/busca", "ContaCadastroController@busca");
    Route::post("/busca2", "ContaCadastroController@busca2");
});

//crud CEST
Route::group(["prefix" => "Cest",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CESTController@salvar");
    Route::delete("/excluir/{id}", "CESTController@excluir");
    Route::get("/editar/{id}", "CESTController@editar");
    Route::post("/busca", "CESTController@busca");
    Route::post("/busca2", "CESTController@busca2");
});

//crud NCM
Route::group(["prefix" => "Ncm",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "NCMController@salvar");
    Route::delete("/excluir/{id}", "NCMController@excluir");
    Route::get("/editar/{id}", "NCMController@editar");
    Route::post("/busca", "NCMController@busca");
    Route::post("/busca2", "NCMController@busca2");
});

//crud Adicinal de OS
Route::group(["prefix" => "AdicionalOS",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "Adicional_OSPedController@salvar");
    Route::delete("/excluir/{id}", "Adicional_OSPedController@excluir");
    Route::get("/editar/{id}", "Adicional_OSPedController@editar");
    Route::post("/busca", "Adicional_OSPedController@busca");
    Route::post("/busca2", "Adicional_OSPedController@busca2");
});

//crud boleto remessa
Route::group(["prefix" => "Boleto_remessa",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "BoletoRemessaController@salvar");
    Route::delete("/excluir/{id}", "BoletoRemessaController@excluir");
    Route::get("/editar/{id}", "BoletoRemessaController@editar");
    Route::post("/busca", "BoletoRemessaController@busca");
    Route::post("/busca2", "BoletoRemessaController@busca2");
});

//crud boleto titulo
Route::group(["prefix" => "Boleto_titulo",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "BoletoTituloController@salvar");
    Route::get("/vizualizar/{id}", "BoletoTituloController@vizualizar");
    Route::delete("/excluir/{id}", "BoletoTituloController@excluir");
    Route::get("/editar/{id}", "BoletoTituloController@editar");
    Route::post("/busca", "BoletoTituloController@busca");
    Route::post("/busca2", "BoletoTituloController@busca2");
    Route::post("/busca3", "BoletoTituloController@busca3");
});


//rotas pdf
Route::get('/pdf_empresas', 'PDFController@gerar_empresas')->middleware('auth');
Route::get('/pdf_funcionarios', 'PDFController@gerar_funcionarios')->middleware('auth');
Route::get('/pdf_clifor', 'PDFController@gerar_clifor')->middleware('auth');
Route::get('/pdf_transportadoras', 'PDFController@gerar_transportadoras')->middleware('auth');

//crud convenio
    Route::group(["prefix" => "Convenio",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ConvenioController@salvar");
    Route::delete("/excluir/{id}", "ConvenioController@destroy");
    Route::get("/editar/{id}", "ConvenioController@editar");
    Route::post("/busca", "ConvenioController@busca");
    Route::post("/busca2", "ConvenioController@busca2");
});

//crud contrato
Route::group(["prefix" => "Contrato",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ContratoController@salvar");
    Route::delete("/excluir/{id}", "ContratoController@destroy");
    Route::get("/editar/{id}", "ContratoController@editar");
    Route::get("/visualizar/{id}", "ContratoController@visualizar");
    Route::post("/busca", "ContratoController@busca");
    Route::post("/busca2", "ContratoController@busca2");
    Route::post("/busca3", "ContratoController@busca3");
});

//crud Movimento de Conta
Route::group(["prefix" => "Movimento",'middleware' => 'auth'], function () {
    Route::post("/pesquisa", "ContaMovimentoController@pesquisaAjax"); // cria essa funcao ou ja existe?
    Route::post("/pesquisaSaldo", "ContaMovimentoController@pesquisaAjaxSaldo"); // cria essa funcao ou ja existe?
    Route::post("/salvar/{id?}", "ContaMovimentoController@salvar");
    Route::delete("/excluir/{id}", "ContaMovimentoController@excluir");
    Route::get("/editar/{id}", "ContaMovimentoController@editar");
    Route::get("/visualizar/{id}", "ContaMovimentoController@visualizar");
    
    
});


//crud DataMovimento
Route::group(["prefix" => "DataMovimento",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "DataContaMovimentoController@salvar");
    Route::delete("/excluir/{id}", "DataContaMovimentoController@destroy");
    Route::get("/visualizar/{id}", "DataContaMovimentoController@visualizar");
    Route::post("/busca", "DataContaMovimentoController@busca");
    Route::post("/busca2", "DataContaMovimentoController@busca2");
    Route::post("/busca3", "DataContaMovimentoController@busca3");
});

//crud Cotação
Route::group(["prefix" => "Cotacao",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CotacaoController@salvar");
    Route::delete("/excluir/{id}", "CotacaoController@destroy");
    Route::get("/editar/{id}", "CotacaoController@editar");
    Route::post("/busca", "CotacaoController@busca");
    Route::post("/busca2", "CotacaoController@busca2");
});


//crud ContasPagar
Route::group(["prefix" => "Contas_Pagar",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ContasPagarController@salvar");
    Route::delete("/excluir/{id}", "ContasPagarController@destroy");
    Route::get("/editar/{id}", "ContasPagarController@editar");
    Route::get("/visualizar/{id}", "ContasPagarController@visualizar");
    Route::post("/pesquisa", "ContasPagarController@pesquisaAjax");
    Route::post("/busca", "ContasPagarController@busca");
    Route::post("/busca2", "ContasPagarController@busca2");
});

//crud ContasPagas
Route::group(["prefix" => "Contas_Pagas",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ContasPagasController@salvar");
    Route::delete("/excluir/{id}", "ContasPagasController@destroy");
    Route::get("/editar/{id}", "ContasPagasController@editar");
    Route::get("/visualizar/{id}", "ContasPagasController@visualizar");
    Route::post("/busca", "ContasPagasController@busca");
    Route::post("/busca2", "ContasPagasController@busca2");
});

//crud ContasReceber
Route::group(["prefix" => "Contas_Receber",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ContasReceberController@salvar");
    Route::delete("/excluir/{id}", "ContasReceberController@destroy");
    Route::get("/editar/{id}", "ContasReceberController@editar");
    Route::get("/visualizar/{id}", "ContasReceberController@visualizar");
    Route::post("/pesquisa", "ContasReceberController@pesquisaAjax");
    Route::post("/busca", "ContasReceberController@busca");
    Route::post("/busca2", "ContasReceberController@busca2");
});
//crud ContasRecebidas
Route::group(["prefix" => "Contas_Recebidas",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ContasRecebidasController@salvar");
    Route::delete("/excluir/{id}", "ContasRecebidasController@destroy");
    Route::get("/editar/{id}", "ContasRecebidasController@editar");
    Route::get("/visualizar/{id}", "ContasRecebidasController@visualizar");
    Route::post("/busca", "ContasRecebidasController@busca");
    Route::post("/busca2", "ContasRecebidasController@busca2");
});

//crud PDV
Route::group(["prefix" => "pdv",'middleware' => 'auth'], function () {
    Route::get("/","PDVController@listar");
    Route::post("/pdv","PDVController@pdv");
    Route::post("/pesquisa", "PDVController@pesquisaAjax");
    
});

//crud Inventario
Route::group(["prefix" => "Inventario",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "InventarioController@salvar");
    Route::delete("/excluir/{id}", "InventarioController@destroy");
    Route::get("/editar/{id}", "InventarioController@editar");
    Route::get("/visualizar/{id}", "InventarioController@visualizar");
    Route::post("/busca", "InventarioController@busca");
    Route::post("/busca2", "InventarioController@busca2");
    Route::post("/busca3", "InventarioController@busca3");
    
});

//crud Fluxo
Route::group(["prefix" => "Fluxo",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "FluxoController@salvar");
    Route::delete("/excluir/{id}", "FluxoController@destroy");
    Route::get("/editar/{id}", "FluxoController@editar");
    Route::post("/busca", "FluxoController@busca");
    Route::post("/busca2", "FluxoController@busca2");
    Route::post("/busca3", "FluxoController@busca3");
});

//crud Fidelidade
Route::group(["prefix" => "Fidelidade",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "FidelidadeController@salvar");
    Route::delete("/excluir/{id}", "FidelidadeController@destroy");
    Route::get("/editar/{id}", "FidelidadeController@editar");
    Route::post("/busca", "FidelidadeController@busca");
    Route::post("/busca2", "FidelidadeController@busca2");
    Route::post("/busca3", "FidelidadeController@busca3");
});

//crud CFOP
Route::group(["prefix" => "CFOP",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CFOPController@salvar");
    Route::delete("/excluir/{id}", "CFOPController@destroy");
    Route::get("/editar/{id}", "CFOPController@editar");
    Route::get("/visualizar/{id}", "CFOPController@visualizar");
    Route::post("/busca", "CFOPController@busca");
    Route::post("/busca2", "CFOPController@busca2");
});

//crud Recibo
Route::group(["prefix" => "Recibo",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ReciboController@salvar");
    Route::delete("/excluir/{id}", "ReciboController@destroy");
    Route::get("/editar/{id}", "ReciboController@editar");
    Route::get("/visualizar/{id}", "ReciboController@visualizar");
    Route::post("/busca", "ReciboController@busca");
    Route::post("/busca2", "ReciboController@busca2");
    Route::post("/busca3", "ReciboController@busca3");
});
//crud Recibo de Titulos
Route::group(["prefix" => "ReciboTitulo",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ReciboTituloController@salvar");
    Route::delete("/excluir/{id}", "ReciboTituloController@destroy");
    Route::get("/editar/{id}", "ReciboTituloController@editar");
    Route::post("/busca", "ReciboTituloController@busca");
    Route::post("/busca2", "ReciboTituloController@busca2");
    Route::post("/busca3", "ReciboTituloController@busca3");
});

//crud Equipamento
Route::group(["prefix" => "Equipamento", 'middleware' => 'auth'], function () {
    Route::post("/salvar/{id}", "EquipamentoController@update");
    Route::post("/salvar", "EquipamentoController@store");
    Route::delete("/excluir/{id}", "EquipamentoController@destroy");
    Route::get("/editar/{id}", "EquipamentoController@edit");
    Route::get("/vizualizar/{id}", "EquipamentoController@view");
    Route::post("/busca", "EquipamentoController@busca");
    Route::post("/busca2", "EquipamentoController@busca2");
});

//crud Telemarketing
Route::group(["prefix" => "Telemarketing", 'middleware' => 'auth'], function () {
    Route::post("/salvar/{id}", "TelemarketingController@store");
    Route::post("/salvar", "TelemarketingController@store");
    Route::delete("/excluir/{id}", "TelemarketingController@destroy");
    Route::get("/editar/{id}", "TelemarketingController@edit");
    Route::get("/visualizar/{id}", "TelemarketingController@view");
    Route::post("/busca", "TelemarketingController@busca");
    Route::post("/busca2", "TelemarketingController@busca2");
    Route::post("/busca3", "TelemarketingController@busca3");
    Route::post("/busca4", "TelemarketingController@busca4");
});

