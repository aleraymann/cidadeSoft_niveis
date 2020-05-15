@extends("template")

@section("conteudo")
@if(session('success_message'))
    <div class="alert alert-danger">
        {{ session('success_message') }}
    </div>
@endif
@include('sweetalert::alert')

<div class="main-panel" style="margin-top:60px">
    <a href="{{ url()->previous() }}" class="btn btn-primary  btn-rounded">
        Voltar
    </a>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Meu Perfil</h4>
                <a href="{{ url("/User/edit_profile") }}" class="btn btn-success">
                    <i class='far fa-edit'></i>
                </a>
            </div>
            <table>
                <tr>
                    <th>
                        <div>
                            @if(auth()->user()->image != null)
                                <img src="{{ url('storage/users/'.auth()->user()->image) }}"
                                    style="max-width:200px; height:200px" alt="image profile" class="ml-2">
                            @else
                                <img src="{{ url("img/profile.jpg") }}"
                                    style="max-width:100px; max-height:200px" alt="Img Profile">
                            @endif

                        </div>
                    </th>
                    <th>
                        <div class="card-body">
                        @if( Auth::user()->hasAnyRoles('s_adm') ||  Auth::user()->hasAnyRoles('adm'))
                            <p> Nome: {{ Auth::user()->name }}</p>
                            <p> Código de Identificação: {{ Auth::user()->id }}</p>
                            <p> Email: {{ Auth::user()->email }}</p>
                        @else
                            <p> Nome: {{ Auth::user()->name }}</p>
                            <p> Código de Identificação: {{ Auth::user()->id }}</p>
                            <p> Email: {{ Auth::user()->email }}</p>   
                            <p> Empresa: {{ Auth::user()->empresa }}</p>
                            <p> Administrador Resposável: {{ Auth::user()->adm }}</p>
                        @endif
                        </div>
                    </th>
                </tr>
            </table>


        </div>
    </div>
</div>

@endsection
