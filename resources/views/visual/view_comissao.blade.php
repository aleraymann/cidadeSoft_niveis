@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/comissao")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="btn-group" role="group">
                @can('edita_comissao')      
        <a href='{{ url("/Comissao/editar/$comissao->Codigo") }}'
        class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
          @endcan
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados da Comissao</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Cod da OS/Ped:</b>
                                    <label>{{ $comissao->OS_Ped }} </label><br> 
                                <b class="ls-label-text">Cod da Venda:</b>
                                    <label>{{ $comissao->Cod_Venda }} </label><br>
                                <b class="ls-label-text">Cod do Funcionario:</b>
                                    <label>{{ $comissao->Cod_Fun }} </label><br>
                                <b class="ls-label-text">Valor da Venda:</b>
                                    <label>R$: {{ $comissao->Valor }} </label><br>
                                <b class="ls-label-text">Valor da Comissão:</b>
                                    <label>R$: {{ $comissao->Comissao }} </label><br>
                                <b class="ls-label-text">Data Prevista para Pagamento:</b>
                                    <label>{{ $comissao->Data_Prev }} </label><br>
                                <b class="ls-label-text">Cod do Item:</b>
                                    <label>{{ $comissao->Cod_Item }} </label><br>
                                <b class="ls-label-text">Transação:</b>
                                    <label>{{ $comissao->Transacao }} </label><br>
                                <b class="ls-label-text">Situação:</b>
                                    <label>{{ $comissao->Situacao=="L"?"Livre":"Bloqueado" }} </label><br>
                                <b class="ls-label-text">Status:</b>
                                    <label>{{ $comissao->Status=="A"?"Aberto":"Pago" }} </label><br>
                                <b class="ls-label-text">Cod Contas a Receber:</b>
                                    <label>{{ $comissao->Cod_Conta }} </label><br>

                            
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
