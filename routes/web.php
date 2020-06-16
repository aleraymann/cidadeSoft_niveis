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

Route::get('/home', 'HomeController@index')->name('home');

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
    
    
});

//crud clifor
Route::group(["prefix" => "Clifor", 'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CliForController@update");
    Route::delete("/excluir/{id}", "CliForController@destroy");
    Route::get("/editar/{id}", "CliForController@edit");
    Route::get("/vizualizar/{id}", "CliForController@view");
    Route::get("/contato","CliForContatoController@listar");
    Route::post("/contato/salvar/{id?}","CliForContatoController@update");
    Route::delete("/contato/excluir/{id}", "CliForContatoController@destroy");
    Route::get("/contato/editar/{id}", "CliForContatoController@edit");
    Route::get("/endereco","CliForEnderecoController@listar");
    Route::post("/endereco/salvar/{id?}","CliForEnderecoController@update");
    Route::delete("/endereco/excluir/{id}", "CliForEnderecoController@destroy");
    Route::get("/endereco/editar/{id}", "CliForEnderecoController@edit");
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
});

//crud empresa
Route::group(["prefix" => "Empresa", 'middleware' => 'auth'], function () {
    Route::post("/salvar/{id}", "EmpresaController@update");
    Route::post("/salvar", "EmpresaController@store");
    Route::delete("/excluir/{id}", "EmpresaController@destroy");
    Route::get("/editar/{id}", "EmpresaController@edit");
    Route::get("/vizualizar/{id}", "EmpresaController@view");
});

//crud consicao de pagamento
Route::group(["prefix" => "Condicao",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "Cond_PagController@salvar");
    Route::delete("/excluir/{id}", "Cond_PagController@excluir");
    Route::get("/editar/{id}", "Cond_PagController@editar");
});

//crud forma de pagamento
Route::group(["prefix" => "Forma",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "Form_PagController@salvar");
    Route::delete("/excluir/{id}", "Form_PagController@excluir");
    Route::get("/editar/{id}", "Form_PagController@editar");
});

//crud transportadora
Route::group(["prefix" => "Transportadora",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "TransportadoraController@salvar");
    Route::delete("/excluir/{id}", "TransportadoraController@excluir");
    Route::get("/editar/{id}", "TransportadoraController@editar");
    Route::get("/vizualizar/{id}", "TransportadoraController@vizualizar");
    Route::post("/destino/salvar/{id?}","Transportadora_DestinoController@salvar");
    Route::delete("/destino/excluir/{id}", "Transportadora_DestinoController@excluir");
    Route::get("/destino/editar/{id}", "Transportadora_DestinoController@editar");
    Route::post("/valor/salvar/{id?}","Transportadora_ValorController@salvar");
    Route::delete("/valor/excluir/{id}", "Transportadora_ValorController@excluir");
    Route::get("/valor/editar/{id}", "Transportadora_ValorController@editar");
});

//crud centro custo
Route::group(["prefix" => "CentroCusto",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CentroCustoController@salvar");
    Route::delete("/excluir/{id}", "CentroCustoController@excluir");  
    Route::get("/editar/{id}", "CentroCustoController@editar");
});


// crud categoria OS
Route::group(["prefix" => "CatOSPed",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CategoriaOSController@salvar");
    Route::delete("/excluir/{id}", "CategoriaOSController@excluir");
    Route::get("/editar/{id}", "CategoriaOSController@editar");
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
});

//crud CEST
Route::group(["prefix" => "Cest",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CESTController@salvar");
    Route::delete("/excluir/{id}", "CESTController@excluir");
    Route::get("/editar/{id}", "CESTController@editar");
});

//crud NCM
Route::group(["prefix" => "Ncm",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "NCMController@salvar");
    Route::delete("/excluir/{id}", "NCMController@excluir");
    Route::get("/editar/{id}", "NCMController@editar");
});

//crud Adicinal de OS
Route::group(["prefix" => "AdicionalOS",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "Adicional_OSPedController@salvar");
    Route::delete("/excluir/{id}", "Adicional_OSPedController@excluir");
    Route::get("/editar/{id}", "Adicional_OSPedController@editar");
});

//crud boleto remessa
Route::group(["prefix" => "Boleto_remessa",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "BoletoRemessaController@salvar");
    Route::delete("/excluir/{id}", "BoletoRemessaController@excluir");
    Route::get("/editar/{id}", "BoletoRemessaController@editar");
});

//crud boleto titulo
Route::group(["prefix" => "Boleto_titulo",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "BoletoTituloController@salvar");
    Route::get("/vizualizar/{id}", "BoletoTituloController@vizualizar");
    Route::delete("/excluir/{id}", "BoletoTituloController@excluir");
    Route::get("/editar/{id}", "BoletoTituloController@editar");
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
});

//crud contrato
Route::group(["prefix" => "Contrato",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "ContratoController@salvar");
    Route::delete("/excluir/{id}", "ContratoController@destroy");
    Route::get("/editar/{id}", "ContratoController@editar");
    Route::get("/visualizar/{id}", "ContratoController@visualizar");
});

//crud contrato
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
});
