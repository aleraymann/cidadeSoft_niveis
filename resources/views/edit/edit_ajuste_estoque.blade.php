@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/ajuste_estoque") }}" class="btn btn-primary ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Ajuste de Estoque
                </h4>
            </div>
            <div class="card-body">


                <div class="modal-body">
                    <form method="post" action="{{ url("/AjusteEstoque/salvar/$id") }}"
                        enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-lg-12" hidden>
                                <b class="ls-label-text" for="user_id">User_ID:</b>
                                <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
                                    readonly value="
@if(Auth::user()->hasAnyRoles('adm') || Auth::user()->hasAnyRoles('s_adm'))
                            {{ Auth::user()->id }}
@else
                            {{ Auth::user()->adm }}
@endif" >
            </div>
          </div>
            <div class=" form-row">
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Data">Data do Ajuste</b>
                                    <input type="date" class="form-control input-border-bottom" name="Data" id="Data"
                                        required maxlength="10" value="{{ $ajuste_estoque->Data }}">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Tipo_Mov">Tipo do Movimento</b>
                                    <select class="form-control input-border-bottom" id="Tipo_Mov" name="Tipo_Mov">
                                        <option
                                            value="{{ isset($ajuste_estoque->Tipo_Mov) ? $ajuste_estoque->Tipo_Mov : '' }} ">
                                            {{ $ajuste_estoque->Tipo_Mov=="S"?"Saída":"Entrada" }}
                                        </option>
                                        <option value="E">Entrada</option>
                                        <option value="S">Saída</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <b class="ls-label-text" for="Justificativa">Justificativa:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Justificativa"
                                        id="Justificativa" minlength="5" maxlength="50" required
                                        value="{{ $ajuste_estoque->Justificativa }}">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Situacao">Tipo do Movimento</b>
                                    <select class="form-control input-border-bottom" id="Situacao" name="Situacao">
                                        <option
                                            value="{{ isset($ajuste_estoque->Situacao) ? $ajuste_estoque->Situacao : '' }} ">
                                            {{ $ajuste_estoque->Situacao }}
                                        </option>
                                        <option value="Aberto">Aberto</option>
                                        <option value="Executado">Executado</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>

                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Cod_Fun">Funcionário:</b>
                                    <select class="form-control input-border-bottom" id="Cod_Fun" name="Cod_Fun"
                                        required>
                                        @foreach($funcionario as $u)
                                            @if(auth()->user()->id == $u->adm)
                                                <option value="{{ $u->id }}"
                                                    {{ $ajuste_estoque->Cod_Fun == $u->id ? "selected" : "" }}>
                                                    {{ $u->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                                    <select class="form-control input-border-bottom" id="Cod_CliFor" name="Cod_CliFor">
                                        <option value="0">Selecione</option>
                                        @foreach($clifor as $clifor)
                                            @can('view_clifor', $clifor)
                                            <option value="{{$clifor->Codigo}}" {{ $ajuste_estoque->Cod_CliFor == $clifor->Codigo ? "selected" : "Selecione" }} >{{$clifor->Nome_Fantasia}}</option>
                                            @endcan
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Empresa">Empresa:</b>
                                    <select class="form-control input-border-bottom" id="Empresa" name="Empresa">
                                        <option value="0">Selecione</option>
                                        @foreach($empresa as $empresa)
                                            @can('view_empresa', $empresa)
                                            <option value="{{ $empresa->Codigo }}" {{ $ajuste_estoque->Empresa == $empresa->Codigo ? "selected" : "" }}> {{ $empresa->Nome_Fantasia }}</option>
                                            @endcan
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">

                                {{ csrf_field() }}
                                <button class="btn btn-success">Salvar</button>
                                <a href="{{ url("/Cadastro/ajuste_estoque") }}"
                                    class="btn btn-danger ml-3">Cancelar</a>
                    </form>

                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script type="text/javascript">
                    $('input').on("keypress", function (e) {
                        /* ENTER PRESSED*/
                        if (e.keyCode == 13) {
                            /* FOCUS ELEMENT */
                            var inputs = $(this).parents("form").eq(0).find(":input");
                            var idx = inputs.index(this);

                            if (idx == inputs.length - 1) {
                                inputs[0].select()
                            } else {
                                inputs[idx + 1].focus(); //  handles submit buttons

                            }
                            return false;
                        }
                    });

                </script>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
            var forms = document.getElementsByClassName('needs-validation');
            // Faz um loop neles e evita o envio
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }

</script>
