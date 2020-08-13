<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Cod_Barras").mask("9999999999999");
        $("#Qtd_EstoqueF").mask("999999.9999");
        $("#Qtd_EstoqueL").mask("999999.9999");
        $("#Qtd_Contagem").mask("999999.9999");
        $("#Divergencia").mask("999999.9999");
    });

</script>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro Itens no Inventario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/InventarioItem/salvar") }}"
                    onsubmit="return checkForm(this);">
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
                                <b class="ls-label-text" for="Cod_Invent">Cod Invent:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Invent"
                                    id="Cod_Invent" required value="{{ $inventario->Codigo }}" readonly>
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
                                <b class="ls-label-text" for="Cod_Barras">Codigo de Barras:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Barras"
                                    id="Cod_Barras" maxlength="13" minlength="3" required>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-5">
                                <b class="ls-label-text" for="Qtd_EstoqueF">Qtd Contábil no Momento da Contagem:</b>
                                <input type="text" class="form-control input-border-bottom" name="Qtd_EstoqueF"
                                    id="Qtd_EstoqueF" maxlength="10" minlength="5" required onblur="qtd_EstoqueF()">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-5">
                                <b class="ls-label-text" for="Qtd_EstoqueL">Qtd Livre no Momento da Contagem:</b>
                                <input type="text" class="form-control input-border-bottom" name="Qtd_EstoqueL"
                                    id="Qtd_EstoqueL" maxlength="10" minlength="5" required onblur="qtd_EstoqueL()">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-5">
                                <b class="ls-label-text" for="Qtd_Contagem">Qtd contada no Inventario:</b>
                                <input type="text" class="form-control input-border-bottom" name="Qtd_Contagem"
                                    id="Qtd_Contagem" maxlength="10" minlength="5" required onblur="qtd_Contagem()">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-5">
                                <b class="ls-label-text" for="Divergencia">Total da Divergência na Contagem:</b>
                                <input type="text" class="form-control input-border-bottom" name="Divergencia"
                                    id="Divergencia" maxlength="10" minlength="5" required onblur="divergencia()">
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
    function qtd_EstoqueF() {
        var desc = parseFloat(document.getElementById('Qtd_EstoqueF').value, 2);
        lim = desc.toFixed(4);
        document.getElementById('Qtd_EstoqueF').value = lim;
    }

    function qtd_EstoqueL() {
        var desc = parseFloat(document.getElementById('Qtd_EstoqueL').value, 2);
        lim = desc.toFixed(4);
        document.getElementById('Qtd_EstoqueL').value = lim;
    }

    function qtd_Contagem() {
        var desc = parseFloat(document.getElementById('Qtd_Contagem').value, 2);
        lim = desc.toFixed(4);
        document.getElementById('Qtd_Contagem').value = lim;
    }

    function divergencia() {
        var desc = parseFloat(document.getElementById('Divergencia').value, 2);
        lim = desc.toFixed(4);
        document.getElementById('Divergencia').value = lim;
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
