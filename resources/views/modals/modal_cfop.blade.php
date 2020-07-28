<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de CFOP</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/CFOP/salvar") }}" onsubmit="return checkForm(this);">
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
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="CFOP">Num da CFOP:</b>
                                <input type="text" class="form-control input-border-bottom" name="CFOP" id="CFOP"
                                    maxlength="10" required>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="ES">Entrada / Saída:</b>
                                <select class="form-control input-border-bottom" name="ES" id="ES" required>
                                    <option value="S">Saída</option>
                                    <option value="E">Entrada</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>

                            <div class="form-group col-lg-3 ml-2">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="AlimFin" name="AlimFin"
                                            value="1">Alimentar Fianceiro Automaticamente?
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="AlimFisc" name="AlimFisc"
                                            value="1">Alimentar Movimento Fiscal Automaticamente?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="Descricao">Descrição:</b>
                                <input type="text" class="form-control input-border-bottom" name="Descricao"
                                    id="Descricao" maxlength="400" required>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="Aplicacao">Aplicação:</b>
                                <input type="text" class="form-control input-border-bottom" name="Aplicacao"
                                    id="Aplicacao" maxlength="400" required>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="Dispositivo">Dispositivo:</b>
                                <input type="text" class="form-control input-border-bottom" name="Dispositivo"
                                    id="Dispositivo" maxlength="200" required>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="ObsnaNFe">Observação a adicionar na NFe:</b>
                                <input type="text" class="form-control input-border-bottom" name="ObsnaNFe"
                                    id="ObsnaNFe" maxlength="200" required>
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
                                    inputs[idx + 1].select();
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

                    function valor() {
                        var desc = parseFloat(document.getElementById('Valor').value, 2);
                        lim = desc.toFixed(2);
                        document.getElementById('Valor').value = lim;
                    }

                </script>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
        </div>
    </div>
</div>
</div>
