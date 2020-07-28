@extends("template")

@section("conteudo")
@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
      @include('sweetalert::alert')

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/cfop") }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   CFOP: {{ $cfop->CFOP }}
                </h4>
                <div class="btn-group " role="group">
                @can('edita_cfop')
                    <a href='{{ url("/CFOP/editar/$cfop->Codigo") }}'
                        class="btn btn-success btn-xs"><i class='far fa-edit'></i></a>
                @endcan
               
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Dados da CFOP</th>
                            </tr>
                        </thead>

                        <tbody>
                        <tr>
                                <td>
                                <b class="ls-label-text">Entrada/Saída</b>
                                    <label>{{ $cfop->ES == "S"? "Saída":"Entrada"}}</label><br>

                                <b class="ls-label-text">Descrição</b>
                                    <label>{{ $cfop->Descricao}}</label><br>
                                
                                <b class="ls-label-text">Aplicação</b>
                                    <label>{{ $cfop->Aplicacao}}</label><br>
                               
                                <b class="ls-label-text">Dispositivo</b>
                                    <label>{{ $cfop->Dispositivo}}</label><br>
                              
                               
                                <b class="ls-label-text">Observação a adicionar na NFe:</b>
                                    <label>{{ $cfop->ObsnaNFe}}</label><br>
                                <b class="ls-label-text">Alimentar o financeiro automaticamente</b>
                                    <label>{{ $cfop->AlimFin == "1"? "Sim":"Não"}}</label><br>
                                    <b class="ls-label-text">Alimentar movimento fiscal automaticamente</b>
                                    <label>{{ $cfop->AlimFisc == "1"? "Sim":"Não"}}</label><br>
                                </td>
                                </tr>
                                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
