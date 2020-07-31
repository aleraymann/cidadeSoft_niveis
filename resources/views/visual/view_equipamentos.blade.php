@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/equipamento") }}" class="btn btn-primary btn-xs ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $equipamento->Equipamento }}
                </h4>
                @can("view_equipamento",$equipamento)
                    <div class="btn-group" role="group">
                        <a href='{{ url("/Equipamento/editar/$equipamento->Codigo") }}'
                            class="btn btn-success btn-xs" style="border-radius:2px;">
                            <i class='far fa-edit'></i>
                        </a>
                    </div>
                @endcan
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>
                                    @if($equipamento->Foto != null)
                                        <img src="{{ url("storage/equipamentos/{$equipamento->Foto}") }}"
                                            style="max-width:150px; height:150px; margin-left:20px;">
                                    @else
                                        <img src="{{ url("img/empresa_padrao.jpg") }}"
                                            style="max-width:150px; height:150px">
                                    @endif
                                </th>
                                <th>
                                <td>
                                    <b class="ls-label-text">Cod do Cliente/Fornecedor:</b>
                                    <label>{{ $equipamento->Cod_CliFor }} </label><br>
                                    <b class="ls-label-text">Num de Serie ou Chassis:</b>
                                    <label>{{ $equipamento->Nro_Serie }} </label><br>
                                    <b class="ls-label-text">Descrição:</b>
                                    <label>{{ $equipamento->Equipamento }} </label><br>
                                    @if($equipamento->Placa != null)
                                        <b class="ls-label-text">Placa:</b>
                                        <label>{{ $equipamento->Placa }} </label><br>
                                    @endif
                                    @if($equipamento->Marca != null)
                                        <b class="ls-label-text">Marca:</b>
                                        <label>{{ $equipamento->Marca }} </label><br>
                                    @endif
                                    @if($equipamento->Modelo != null)
                                        <b class="ls-label-text">Modelo:</b>
                                        <label>{{ $equipamento->Modelo }} </label><br>
                                    @endif
                                    @if($equipamento->Nro_Frota != null)
                                        <b class="ls-label-text">Num do Equip na Frota:</b>
                                        <label>{{ $equipamento->Nro_Frota }} </label><br>
                                    @endif
                                    @if($equipamento->Fabricacao != null)
                                        <b class="ls-label-text">Fabricação:</b>
                                        <label>{{ $equipamento->Fabricacao }} </label><br>
                                    @endif
                                    @if($equipamento->Combustivel != null)
                                        <b class="ls-label-text">Combustível:</b>
                                        <label>{{ $equipamento->Combustivel }} </label><br>
                                    @endif
                                    @if($equipamento->Acessorios != null)
                                        <b class="ls-label-text">Acessórios:</b>
                                        <label>{{ $equipamento->Acessorios }} </label><br>
                                    @endif
                                    @if($equipamento->Estado != null)
                                        <b class="ls-label-text">Estado de Conservação:</b>
                                        <label>{{ $equipamento->Estado }} </label><br>
                                    @endif
                                   
                                   
                                </td>
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
