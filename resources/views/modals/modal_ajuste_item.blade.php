<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Qtd").mask("999999.9999");
        $("#Preco").mask("99999999.99");
        $("#Valor").mask("99999999.99");
    });

</script>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Itens Ajustados</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/AjusteItem/salvar") }}" onsubmit="return checkForm(this);">
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
                            <div class="form-group col-lg-1" hidden>
                                <b class="ls-label-text" for="Cod_Ajuste">Cod Ajuste:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Ajuste"
                                    id="Cod_Ajuste" required value="{{ $ajuste_estoque->Codigo }}" readonly>
                                <div class="invalid-feedback">
                                    Por favor, Mínimo 2 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Cod_Ref">Codigo de Referência:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Ref" id="Cod_Ref"
                                    maxlength="25" minlength="3" required>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Cod_Item">Item:</b>
                                <select class="form-control input-border-bottom" id="Cod_Item" name="Cod_Item">
                                    <option value="0">Selecione</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Qtd">Quantidade de ajuste:</b>
                                <input type="text" class="form-control input-border-bottom" name="Qtd" id="Qtd"
                                    maxlength="10" minlength="5" required onblur="qtd()" value="0.0000">
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
                                <b class="ls-label-text" for="Preco">Preço Unitário:</b>
                                <input type="text" class="form-control input-border-bottom" name="Preco" id="Preco"
                                    maxlength="10" minlength="5" required onblur="preco()" value="0.00">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Total">Valor Total:</b>
                                <input type="text" class="form-control input-border-bottom" name="Total" id="Total"
                                    maxlength="10" minlength="5" required onblur="total()" value="0.00">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
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
                        <div class="form-row">

                            {{ csrf_field() }}
                            <button class="btn btn-success" name="cadastrar">Cadastrar</button>
                            <input class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos' />
                </form>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function qtd() {
        var desc = parseFloat(document.getElementById('Qtd').value, 2);
        lim = desc.toFixed(4);
        document.getElementById('Qtd').value = lim;
    }

    function preco() {
        var desc = parseFloat(document.getElementById('Preco').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Preco').value = lim;
    }

    function total() {
        var desc = parseFloat(document.getElementById('Total').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Total').value = lim;
    }

</script>
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
