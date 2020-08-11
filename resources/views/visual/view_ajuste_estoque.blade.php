@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/ajuste_estoque")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                  Data: {{ $ajuste_estoque->Data }}
                </h4>
                <div class="btn-group" role="group">
                @can('edita_ajuste_est')      
        <a href='{{ url("/AjusteEstoque/editar/$ajuste_estoque->Codigo") }}' class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
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
                                <th>Dados do Ajuste</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Situação</b>
                                    <label>{{ $ajuste_estoque->Situacao }}</label><br>

                                <b class="ls-label-text">Tipo do Movimento:</b>
                                <label>{{ $ajuste_estoque->Tipo_Mov=="S"?"Saída":"Entrada" }}</label><br>

                                <b class="ls-label-text">Justificativa:</b>
                                    <label>{{ $ajuste_estoque->Justificativa }} </label><br>

                                    
                                <b class="ls-label-text">Cod do Funcionário:</b>
                                    <label>{{ $ajuste_estoque->Cod_Fun }} </label><br>

                                    
                                <b class="ls-label-text">Cod do Cliente/Fornecedor:</b>
                                    <label>{{ $ajuste_estoque->Cod_CliFor }} </label><br>

                                    
                                <b class="ls-label-text">Cod da Empresa:</b>
                                    <label>{{ $ajuste_estoque->Empresa }} </label><br>
                               
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
