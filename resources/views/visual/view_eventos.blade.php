@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
    
      <div class="main-panel">
        <div style="margin-top:60px">
        <a href="{{ url("/Calendario") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
        <!-- Button to Open the Modal -->
        @include('sweetalert::alert')
        <!--end container-->    
      </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Eventos
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Cod do Resp.</th>
                                <th class="">Evento </th>
                                <th class="">Descrição </th>
                                <th class="">Data de Início</th>
                                <th class="">Data de Término</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($events as $e)
                        @can('view_eventos', $e)
                                <tr>
                                    <td class=""> {{ $e->id }} </td>
                                    <td class=""> {{ $e->cod_usuario }} </td>
                                    <td class=""> {{ $e->evento }} </td>
                                    <td class=""> {{ $e->descricao }} </td>
                                    <td class=""> {{ $e->data_inicio }} </td>
                                    <td class=""> {{ $e->data_fim }} </td>
                                    <td class=""> {{ $e->user_id }} </td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                        @can('edita_evento')
                                            <a href={{ url("/Calendario/editar/$e->id") }}
                                                class="btn btn-success"><i class='far fa-edit'></i></a>
                                        @endcan
                                        @can('deleta_evento')
                                                <a  href="javascript:deletarRegistro('{{ $e->id }}')"
                                                class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                        @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endcan   
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
      
    </div>
</div>

@endsection

<script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
<script>
    function deletarRegistro(id) {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        swal({
            title: "Excluir",
            text: "Excluir do item selecionado?",
            icon: "warning",
            buttons: {
                confirm: {
                    text: 'Sim',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Não',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url("Calendario/excluir") }}" + '/' + id,
                    type: 'DELETE',
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },
                    success: function () {
                        location.reload();
                        swal({
                            title: "Registro deletado com sucesso!",
                            icon: "success",
                        });

                    },
                    error: function () {
                        swal("Erro!", "Algo de errado aconteceu!", );
                    }
                });

            }
        });
    }

</script>