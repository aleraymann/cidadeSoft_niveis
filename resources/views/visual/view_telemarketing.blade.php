@extends("template")

@section("conteudo")
@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
      @include('sweetalert::alert')

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/telemarketing") }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Data do Contato: {{ $telemarketing->Data }}
                </h4>
                <div class="btn-group " role="group">
                @can('edita_tele')
                    <a href='{{ url("/Telemarketing/editar/$telemarketing->Codigo") }}'
                        class="btn btn-success btn-xs"><i class='far fa-edit'></i></a>
                @endcan
               
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Dados do Contato</th>
                            </tr>
                        </thead>

                        <tbody>
                        <tr>
                                <td>
                                <b class="ls-label-text">Concluído?</b>
                                    <label>{{ $telemarketing->Concluso == "1"? "Sim":"Não"}}</label><br>
                                    <b class="ls-label-text">Data de Conclusão:</b>
                                    <label>{{ $telemarketing->Data_Conclusao}}</label><br>

                                <b class="ls-label-text">Cod do Cli / For:</b>
                                    <label>{{ $telemarketing->Cod_CliFor}}</label><br>
                                <b class="ls-label-text">Agendou Visita?</b>
                                    <label>{{ $telemarketing->Agendou_Visita == "1"? "Sim":"Não"}}</label><br>
                                <b class="ls-label-text">Agendou Atendimento?</b>
                                    <label>{{ $telemarketing->Agendou_Atendimento == "1"? "Sim":"Não"}}</label><br>
                                <b class="ls-label-text">Agendou Serviço?</b>
                                    <label>{{ $telemarketing->Agendou_Servico == "1"? "Sim":"Não"}}</label><br>
                                <b class="ls-label-text">Assunto</b>
                                    <label>{{ $telemarketing->Assunto}}</label><br>
                                </td>
                                </tr>
                                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
