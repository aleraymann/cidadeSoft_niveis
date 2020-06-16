@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/movimento")}}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Data: {{ $data_movimento->Data }}
                </h4>
                <div class="btn-group" role="group">
    </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th class="">Espécie</th>
                                <th class="">Documento</th>
                                <th class="">Número do Documento</th>
                                <th class="">Valor</th>
                                <th class="">Operador</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($conta as $c)
                        @if($c->data_id == $data_movimento->Codigo)
                           <tr>
                            <td class="">{{ $c->Codigo }}  </td>
                               @if( $c->Especie===1)
                            <td> Dinheiro </td>
                                @elseif( $c->Especie===2)
                            <td> Cheque </td>
                                @else
                            <td> Cartão </td>
                                @endif
                               <td class="">{{ $c->Documento == "NFF"? "Nota Fiscal": "Recibo" }}  </td>
                               <td class="">{{ $c->Num_Doc }}  </td>
                               <td class="">{{ $c->Valor }}  </td>
                               <td class="">{{ $c->Operador=="C"? "Crédito" : "Débito" }}  </td>
                               <td class="">{{ $c->user_id }}  </td>
                              
                               <td class="">
                                   <div class="btn-group" role="group">
                                   @can('edita_mov')
                                   <a href='{{ url("/Movimento/editar/$c->Codigo") }}'
                                                class="btn btn-success "><i class='far fa-edit'></i></a>
                                   @endcan
                                   @can('visual_mov')
                                   <a href='{{url("/Movimento/visualizar/$c->Codigo")}}' class="btn btn-secondary">
                                   <i class='far fa-eye'></i></a>
                                   @endcan
                                   @can('deleta_mov')
                                   <a href="javascript:deletarRegistro('{{ $c->Codigo }}')"
                                       class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                    @endcan
                                   </div>
                               </td>
                           </tr>
                      @endif
                      @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                    url: "{{ url("Movimento/excluir") }}" + '/' + id,
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