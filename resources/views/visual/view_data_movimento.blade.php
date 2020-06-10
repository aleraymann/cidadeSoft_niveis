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
                               <td class="">{{ $c->Documento }}  </td>
                               <td class="">{{ $c->Num_Doc }}  </td>
                               <td class="">{{ $c->Valor }}  </td>
                               <td class="">{{ $c->Operador }}  </td>
                               <td class="">{{ $c->user_id }}  </td>
                              
                               <td class="">
                                   <div class="btn-group" role="group">
                                   <a href='{{ url("/Movimento/editar/$c->Codigo") }}'
                                                class="btn btn-success "><i class='far fa-edit'></i></a>
                                   
                                   <a href='{{url("/Movimento/visualizar/$c->Codigo")}}' class="btn btn-secondary">
                                   <i class='far fa-eye'></i></a>

                                   <a href="javascript:deletarRegistro('{{ $c->Codigo }}')"
                                       class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                 
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
