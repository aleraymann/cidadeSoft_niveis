@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/duplicata")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                  Data: {{ $duplicata->Vencimento }}
                </h4>
                <div class="btn-group" role="group">
                @can('edita_ajuste_est')      
        <a href='{{ url("/Duplicata/editar/$duplicata->Codigo") }}' class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
            <i class='far fa-edit'></i>
        </a>
          @endcan
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados da Duplicata</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Numero da Fatura</b>
                                    <label>{{ $duplicata->Fatura }}</label><br>

                                <b class="ls-label-text">Valor:</b>
                                <label>R$: {{ $duplicata->Valor}}</label><br>

                                <b class="ls-label-text">Codigo da NF:</b>
                                    <label>{{ $duplicata->Cod_NF }} </label><br>
                                
                                <b class="ls-label-text">Transação:</b>
                                    <label>{{ $duplicata->Transacao }} </label><br>

                                    
                                <b class="ls-label-text">Cod do Cliente / Fornecedor:</b>
                                    <label>{{ $duplicata->Cod_CliFor }} </label><br>

                                    
                                <b class="ls-label-text">Cod do Boleto:</b>
                                    <label>{{ $duplicata->Cod_Boleto }} </label><br>

                                    
                                <b class="ls-label-text">Cod da Empresa:</b>
                                    <label>{{ $duplicata->Empresa }} </label><br>
                               
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
