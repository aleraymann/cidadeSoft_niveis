@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/contrato")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Contrato
                </h4>
                <div class="btn-group" role="group">
                @can('edita_contrato')
        <a href='{{ url("/Contrato/editar/$contrato->Codigo") }}'
        class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
            @endcan
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados Contrato</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Cod do Cli/For:</b>
                                    <label>{{ $contrato->Cod_CliFor }} </label><br> 
                                <b class="ls-label-text">Dia do Vencimento da Parcela:</b>
                                    <label>{{ $contrato->Dia_Venc}} </label><br>
                                <b class="ls-label-text">Parceria:</b>
                                    <label>{{ $contrato->Parceria==1?"Sim":"Não" }}</label><br>
                                @if( $contrato->Parceria==1)
                                <b class="ls-label-text">Parceiro:</b>
                                    <label>{{ $contrato->Parceiro }} </label><br>
                                @endif
                                <b class="ls-label-text">Percentual de Comissão:</b>
                                    <label>{{ $contrato->Perc_Comissao }} </label><br>
                                <b class="ls-label-text">Data do Contrato:</b>
                                    <label>{{ $contrato->Data }} </label><br>
                                <b class="ls-label-text">Tipo de Cobrança:</b>
                                    <label>{{ $contrato->Tipo_Cob }} </label><br>
                                <b class="ls-label-text">Cod do Convenio:</b>
                                    <label>{{ $contrato->Convenio }} </label><br>
                                <b class="ls-label-text">Valor da Mensalidade:</b>
                                    <label>{{ $contrato->Valor }} </label><br>
                                    <b class="ls-label-text">Observações Gerais:</b>
                                    <label>{{ $contrato->Observacoes }} </label><br>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
