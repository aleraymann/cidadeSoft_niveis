@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/funcionarios") }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                 {{ $funcionario->Nome }}<br>
                </h4>
                <div class="btn-group" role="group">
        <a href='{{ url("/Funcionario/editar/$funcionario->Codigo") }}' class="btn btn-success btn-xs" style="border-radius:2px;">
            <i class='far fa-edit'></i>
        </a>
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados do Funcionário</th>
                                <th class="">Dados de Endereço</th>
                                <th class="">Dados do Usuário</th>
                                <th class="">Dados do Vendedor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b class="ls-label-text">Nome:</b>
                                    <label>{{ $funcionario->Nome }} </label><br>
                                    <b class="ls-label-text">CPF:</b>
                                    <label>{{ $funcionario->CPF }} </label><br>
                                    <b class="ls-label-text">RG:</b>
                                    <label>{{ $funcionario->RG }} </label><br>
                                    <b class="ls-label-text">Telefone:</b>
                                    <label>{{ $funcionario->Telefone }} </label><br>
                                    <b class="ls-label-text">Celular:</b>
                                    <label>{{ $funcionario->Celular }} </label><br>
                                    <b class="ls-label-text">Email:</b>
                                    <label>{{ $funcionario->Email }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Endereço:</b>
                                    <label>{{ $funcionario->Endereco }} </label><br>
                                    <b class="ls-label-text">Bairro:</b>
                                    <label>{{ $funcionario->Bairro }} </label><br>
                                    <b class="ls-label-text">Cidade:</b>
                                    <label>{{ $funcionario->Cidade }} </label><br>
                                    <b class="ls-label-text">Estado:</b>
                                    <label>{{ $funcionario->Estado }} </label><br>
                                    <b class="ls-label-text">Cep:</b>
                                    <label>{{ $funcionario->CEP }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Nome do Usuário:</b>
                                    <label>{{ $funcionario->Usuario }} </label><br>
                                    <b class="ls-label-text">Numero de Identificação:</b>
                                    <label>{{ $funcionario->idmsgs }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Comissão de Venda:</b>
                                    <label>{{ $funcionario->ComiVend }} </label><br>
                                    <b class="ls-label-text">Comissão de Seriços:</b>
                                    <label>{{ $funcionario->ComiServ }} </label><br>
                                    <b class="ls-label-text">Limite desc à vista:</b>
                                    <label>{{ $funcionario->LimDescPV }} </label><br>
                                    <b class="ls-label-text">Limite desc à Prazo:</b>
                                    <label>{{ $funcionario->LimDescPP }} </label><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    @endsection
