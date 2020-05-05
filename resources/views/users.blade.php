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
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-rounded">
            Voltar
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
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="">Código</th>
                                <th class="">Usuário</th>
                                <th class="">Email</th>
                                <th class="">Empresa</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($users as $u)
                                <tr>
                                    <td class=""> {{ $u->id }} </td>
                                    <td class=""> {{ $u->name }} </td>
                                    <td class=""> {{ $u->email }} </td>
                                    <td class="">
                                        {{ $u->empresa !== null?" Funcionario(Empresa:  $u->empresa)": "Adm" }}
                                    </td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                            <a href='' class="btn btn-success"><i class='far fa-edit'></i></a>
                                            <a href='{{ url("/User/vizualizar/$u->id") }}'
                                                class="btn btn-primary"><i class='flaticon-lock-1'></i></a>
                                            <a href="" class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
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
</div>
@endsection
