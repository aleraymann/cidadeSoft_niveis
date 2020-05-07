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


//atribuir permissoes a cargos
Route::post("/Permission_role/salvar/{id?}", 'PermissionRoleController@salvar')->middleware('auth');

//atribuir cargos a usuarios
Route::post("/Role_user/salvar/{id?}", 'RoleUserController@salvar')->middleware('auth');


// crud cargos
Route::group(["prefix" => "Role",'middleware' => 'auth'], function () {
    Route::get("/", 'RolesController@index')->middleware('auth');
    Route::get("/vizualizar/{id}", 'RolesController@permissions')->middleware('auth');
    Route::post("/salvar/{id?}", 'RolesController@salvar')->middleware('auth');
    Route::delete("/excluir/{id}", "RolesController@excluir")->middleware('auth');
});

// crud users
Route::group(["prefix" => "User",'middleware' => 'auth'], function () {
    Route::get("/", 'UsersController@index')->middleware('auth');
    Route::get("/vizualizar/{id}", 'UsersController@roles')->middleware('auth');
    Route::delete("/excluir/{id}", "UsersController@excluir")->middleware('auth');
    Route::post("/salvar/{id?}", 'UsersController@salvar')->middleware('auth');
    Route::get("/editar/{id}", "UsersController@editar")->middleware('auth');
});

//visualizar mapas
Route::get("/Maps", function () {
    return view('maps');
})->middleware('auth');


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
    
});

//crud clifor
Route::group(["prefix" => "Clifor", 'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "CliForController@salvar");
    Route::delete("/excluir/{id}", "CliForController@excluir");
    Route::get("/editar/{id}", "CliForController@editar");
    Route::get("/vizualizar/{id}", "CliForController@vizualizar");
    Route::get("/contato","CliForContatoController@listar");
    Route::post("/contato/salvar/{id?}","CliForContatoController@salvar");
    Route::delete("/contato/excluir/{id}", "CliForContatoController@excluir");
    Route::get("/contato/editar/{id}", "CliForContatoController@editar");
    Route::get("/endereco","CliForEnderecoController@listar");
    Route::post("/endereco/salvar/{id?}","CliForEnderecoController@salvar");
    Route::delete("/endereco/excluir/{id}", "CliForEnderecoController@excluir");
    Route::get("/endereco/editar/{id}", "CliForEnderecoController@editar");
    Route::get("/referencia","CliForReferenciaController@listar");
    Route::post("/referencia/salvar/{id?}","CliForReferenciaController@salvar");
    Route::delete("/referencia/excluir/{id}", "CliForReferenciaController@excluir");
    Route::get("/referencia/editar/{id}", "CliForReferenciaController@editar");
});

//crud funcionario
Route::group(["prefix" => "Funcionario",'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "FuncionarioController@salvar");
    Route::delete("/excluir/{id}", "FuncionarioController@excluir");
    Route::get("/editar/{id}", "FuncionarioController@editar");
    Route::get("/vizualizar/{id}", "FuncionarioController@vizualizar");
});

//crud empresa
Route::group(["prefix" => "Empresa", 'middleware' => 'auth'], function () {
    Route::post("/salvar/{id?}", "EmpresaController@salvar");
    Route::delete("/excluir/{id}", "EmpresaController@excluir");
    Route::get("/editar/{id}", "EmpresaController@editar");
    Route::get("/vizualizar/{id}", "EmpresaController@vizualizar");
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



