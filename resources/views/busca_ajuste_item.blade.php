@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{  url()->previous()}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            @if($criterio != "")
                    <h4 class="card-title">Busca filtrada com: "{{ $criterio }}" </h4>
                @endif
               
            </div>
            <div>
                    <a href="{{  url()->previous() }}" class="btn btn-sm btn-info mt-3 ml-2">Todos</a>
                </div>
            <div class="card-body">
            <div class="table-responsive">
            <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th class="">Cod de Ref</th>
                                <th class="">Cod do Item</th>
                                <th class="">Quantidade</th>
                                <th class="">Preço Unitário</th>
                                <th class="">Valor Total</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($ajuste_item as $c)
                        @can('view_ajuste_item', $c)
                           <tr>
                            <td class="">{{ $c->Codigo }}  </td>
                               <td class="">{{ $c->Cod_Ref }}  </td>
                               <td class="">{{ $c->Cod_Item }}  </td>
                               <td class="">{{ $c->Qtd }}  </td>
                               <td class="">{{ $c->Preco }}  </td>
                               <td class="">{{ $c->Total }}  </td>
                               <td class="">{{ $c->user_id }}  </td>
                              
                               <td class="">
                                   <div class="btn-group" role="group">
                                   @can('edita_ajuste_item')
                                   <a href='{{ url("/AjusteItem/editar/$c->Codigo") }}'
                                   class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                   @endcan
                                   @can('deleta_ajuste_item')
                                   <a href="javascript:deletarRegistro('{{ $c->Codigo }}')"
                                   class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='far fa-trash-alt'></i></a>
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
                    url: "{{ url("InventarioItem/excluir") }}" + '/' + id,
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
