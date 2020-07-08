<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Role;
use App\model\Funcionario;
use App\model\Empresa;
use Gate;

class UsersController extends Controller
{
    private $user;
    
    public function __construct(user $user)
    {
        $this->user = $user;
    }
    

    public function index()
    {
        if (Gate::denies('view_users')) {
            return redirect()->back();
        }

        $role = Role::all();

        $users = $this->user->paginate(10);
        $totUsers = User::all();
        $empresas = Empresa::all();
        return view('users', compact('users', 'role', 'empresas','totUsers'));
    }

    public function roles($id)
    {
        if (Gate::denies('view_users')) {
            return redirect()->back();
        }
        $user = $this->user->find($id);
        //recuperar permissinos
        $roles = $user->roles;
        return view('users_roles', compact('roles', 'user'));
    }

    public function excluir($Codigo, User $user)
    {
        $user->destroy($Codigo);
    }

    public function editar(User $user, $id)
    {
        if (Gate::denies('view_users')) {
            return redirect()->back();
        }
        $user = $user->find($id);
        return view("edit.edit_users", compact("user", "id"));
    }

    public function salvar(Request $dadosFormulario, User $user, $id = null)
    {
        try {
            if ($id > 0) {
                if (Gate::denies('view_users')) {
                    return redirect()->back();
                }
                
                $dados = $user->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("UsersController@index")
                ->with("toast_success", "Registro Editado Com Sucesso");
            } else {
                $user->create($dadosFormulario->all());
                //dd($dadosFormulario);
            }
            
            return redirect()
            ->action("UsersController@index")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return redirect()
            ->action("EmpresaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        $data['image'] = $user->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) { // existe imagem nova
            
                $name = $user->id.kebab_case($user->name); // Define um novo nome data atual (nunca dar nome duplicado e sobrescrever)
                $extension = $request->image->extension(); // Recupera a extensão do arquivo
                $nameFile = "{$name}.{$extension}"; // Define finalmente o nome

                //dd($nameFile);

                //local
                $upload = $request->image->storeAs('users', $nameFile); // Faz o upload:

                //hospedagem
                /*
                 $upload = $request->image;
                $destinationPath = public_path('../../public_html/cidadesoft/storage/users');
                $upload->move($destinationPath, $nameFile); // Faz o upload:
                */

                $data['image'] = $nameFile;
                if (!$upload) { // SE NAO FIZER O UPLOAD PARA O STORAGE
                    return redirect()
                    ->back()
                    ->with("toast_error", "Houve um erro ao gravar o Imagem");
                    }
                }
        //dd($data); // Confere os dados que estaram passando para o update
         $user->update($data); // grava todos os conteudos automativo
                return redirect('/User/profile') // SE CHEGOU AQUI, DADOS ATUALIZADOS COM SUCESSO
                ->with("toast_success", "Perfil Editado Com Sucesso");

            }
}
    
