@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@if(session('success_message'))
    <div class="alert alert-danger">
        {{ session('success_message') }}
    </div>
@endif

<div class="main-panel">

    <div class="ml-2" style="margin-top:60px">
        <a href="{{ url()->previous() }}" class="btn btn-primary ml-3 mb-1">
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
                <h4 class="card-title">Usuários
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        Atribuir Cargos
                    </button>
                </h4>
               
                @include("modals.modal_role_user")
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class="">Código</th>
                                <th class="">Imagem</th>
                                <th class="">Usuário</th>
                                <th class="">Email</th>
                                <th class="">Cargo</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($users as $u)
                                <tr>
                                    <td class=""> {{ $u->id }} </td>
                                    <td>
                                    @if($u->image != null)
                                    <img src="{{ url("storage/users/{$u->image}") }}" style="max-width:50px; height:50px">
                            @else
                                <img src="{{ url("img/profile.jpg") }}" style="max-width:50px; height:50px" alt="Img Profile" >
                            @endif
                                  
                                    </td>
                                    <td class=""> {{ $u->name }} </td>
                                    <td class=""> {{ $u->email }} </td>
                                    <td class="">
                                    @if( $u->hasAnyRoles('s_adm'))
                                         Super Admin
                                    @elseif( $u->hasAnyRoles('adm'))
                                        Administrador
                                    @else
                                        Funcionário
                                    @endif
                                    </td>
                                    <td class=""> {{ $u->adm }} </td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                        <a href='{{ url("/User/editar/$u->id") }}'
                                                    class="btn btn-success"><i class='far fa-edit'></i></a>
                                            <a href='{{ url("/User/vizualizar/$u->id") }}'
                                                class="btn btn-primary"><i class='flaticon-lock-1'></i></a>
                                                <a href="javascript:deletarRegistro('{{ $u->id }}')"
                                                class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        {{ $users->links() }}
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
                    url: "{{ url("User/excluir") }}" + '/' + id,
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