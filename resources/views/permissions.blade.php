@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@if(session('success_message'))
    <div class="alert alert-danger">
        {{ session('success_message') }}
    </div>
@endif

<div class="main-panel">
    <div style="margin-top:60px">
        <!-- Button to Open the Modal -->
        @include('sweetalert::alert')
        <!--end container-->
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Permissões
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Permissão</th>
                                <th>Função</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($permissions as $p)
                                <tr>
                                    <td class=""> {{ $p->name }} </td>
                                    <td class=""> {{ $p->label }} </td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                            <a href='' class="btn btn-success"><i class='far fa-edit'></i></a>
                                            <a href='{{url("/Permission/vizualizar/$p->id")}}' class="btn btn-secondary"><i class='far fa-eye'></i></a>
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
