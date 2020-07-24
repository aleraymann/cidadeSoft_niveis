@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Cod_item").mask("99999999999");
        $("#Valor").mask("99999999.99", {
            reverse: true
        });
        $("#Qtd_Alterar").mask("999999.9999", {
            reverse: true
        });
        $("#Cod_Item_Dev").mask("99999");
        $("#Qtd_Dev").mask("999999.9999", {
            reverse: true
        });
    });

</script>
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/adicional_osped") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Adicionais OS/Pedido
                </h4>
            </div>
            <div class="card-body">


                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/AdicionalOS/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/AdicionalOS/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Cod_item">Cód Item</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_item" id="Cod_item"
                                placeholder="" required minlength="" maxlength="11"
                                value="{{ isset($adicional_osped->Cod_item) ? $adicional_osped->Cod_item : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Ref">Cód de Refêrencia do Item:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Ref" id="Cod_Ref"
                                minlength="5" maxlength="25" required
                                value="{{ isset($adicional_osped->Cod_Ref) ? $adicional_osped->Cod_Ref : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Descricao">Descrição:</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                                minlength="5" maxlength="40" required
                                value="{{ isset($adicional_osped->Descricao) ? $adicional_osped->Descricao : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Valor">Valor</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor"
                            onblur=" valor()" required
                                value="{{ isset($adicional_osped->Valor) ? $adicional_osped->Valor : '' }}">
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
                            <b class="ls-label-text" for="Qtd_Alterar">Quantidade a Alterar:</b>
                            <input type="text" class="form-control input-border-bottom" name="Qtd_Alterar"
                                id="Qtd_Alterar"
                                value="{{ isset($adicional_osped->Qtd_Alterar) ? $adicional_osped->Qtd_Alterar : '' }}"
                                required>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Item_Dev ">Cod Item de Devoluçao:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Item_Dev"
                                id="Cod_Item_Dev"
                                value="{{ isset($adicional_osped->Cod_Item_Dev) ? $adicional_osped->Cod_Item_Dev : '' }}"
                                required>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Ref_Dev">Cod Ref Item de Devoluçao:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Ref_Dev"
                                id="Cod_Ref_Dev"
                                value="{{ isset($adicional_osped->Cod_Ref_Dev) ? $adicional_osped->Cod_Ref_Dev : '' }}"
                                required>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Qtd_Dev">Quantidade a Devolver:</b>
                            <input type="text" class="form-control input-border-bottom" name="Qtd_Dev" id="Qtd_Dev"
                                value="{{ isset($adicional_osped->Qtd_Dev) ? $adicional_osped->Qtd_Dev : '' }}"
                                required>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>

                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/adicional_osped") }}" class="btn btn-danger ml-3">Cancelar</a>
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
