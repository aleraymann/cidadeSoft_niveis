@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url()->previous()}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Item: {{ $inventario_item->Cod_Ref }}
                </h4>
                <div class="btn-group" role="group">
                @can('edita_contrato')
        <a href='{{ url("/InventarioItem/editar/$inventario_item->Codigo") }}'
        class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
            @endcan
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados Item</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Cod do Inventário:</b>
                                    <label>{{ $inventario_item->Cod_Invent }} </label><br> 
                                <b class="ls-label-text">Cod do Item:</b>
                                    <label>{{ $inventario_item->Cod_Item }} </label><br> 
                                <b class="ls-label-text">Cod de Barras:</b>
                                    <label>{{ $inventario_item->Cod_Barras }} </label><br>
                                <b class="ls-label-text">Qtde Contabil no momento da contagem:</b>
                                    <label>{{ $inventario_item->Qtd_EstoqueF }} </label><br> 
                                <b class="ls-label-text">Qtde Livre no momento da contagem:</b>
                                    <label>{{ $inventario_item->Qtd_EstoqueL }} </label><br> 
                                <b class="ls-label-text">Quantidade Contada no Inventaro:</b>
                                    <label>{{ $inventario_item->Qtd_Contagem }} </label><br> 
                                <b class="ls-label-text">Total de Divergencia:</b>
                                    <label>{{ $inventario_item->Divergencia }} </label><br> 
                                
                                
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
