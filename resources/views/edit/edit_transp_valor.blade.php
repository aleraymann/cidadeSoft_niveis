@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#KmIni").mask("99999");
        $("#KmFim").mask("99999");
        $("#Indice_v").mask("9.99");

    });

</script>
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url()->previous() }}" class="btn btn-primary ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Valor
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Transportadora/valor/salvar") }}">
                        @else
                            <form method="post"
                                action="{{ url("Transportadora/valor/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-1" hidden>
                            <label for="Cod_Transp">Empresa:</label>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Transp"
                                id="Cod_Transp"
                                value="{{ isset($transportadora_valor->Cod_Transp) ? $transportadora_valor->Cod_Transp : '' }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="KmIni">Km Início</label>
                            <input type="text" class="form-control input-border-bottom" name="KmIni" id="KmIni"
                                placeholder="" required
                                value="{{ isset($transportadora_valor->KmIni) ? $transportadora_valor->KmIni : '' }}">
                            <div class="invalid-feedback">
                                Por Favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="KmFim">Km Final</label>
                            <input type="text" class="form-control input-border-bottom" name="KmFim" id="KmFim"
                                placeholder="" required
                                value="{{ isset($transportadora_valor->KmFim) ? $transportadora_valor->KmFim : '' }}">
                            <div class="invalid-feedback">
                                Por Favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="Indice_v">Índice para cobrança</label>
                            <input type="text" class="form-control input-border-bottom" name="Indice_v" id="Indice_v"
                                maxlength="3" minlength="1" required
                                value="{{ isset($transportadora_valor->Indice_v) ? $transportadora_valor->Indice_v : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-row">-->
                {{ csrf_field() }}
                <button class="btn btn-success">Salvar</button>
                </form>
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

        </script>
