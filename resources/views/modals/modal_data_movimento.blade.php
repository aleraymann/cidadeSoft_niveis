<!-- The Modal -->
<div class="modal fade" id="myModaldata">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Datas de Movimento
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/DataMovimento/salvar") }}"
                        onsubmit="return checkForm(this);">
                    @else
                        <form method="post" action="{{ url("/DataMovimento/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif
                <div class="form-row">
                    <div class="form-group col-lg-12" hidden>
                        <b class="ls-label-text" for="user_id">User_ID:</b>
                        <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id" readonly
                            value="
@if(Auth::user()->hasAnyRoles('adm') || Auth::user()->hasAnyRoles('s_adm'))
                            {{ Auth::user()->id }}
@else
                            {{ Auth::user()->adm }}
@endif" >
            </div>
          </div>
                <div class=" form-row">
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Num_caixa">Número do Caixa:</b>
                            <input type="text" class="form-control input-border-bottom" name="Num_caixa" id="Num_caixa"
                                required minlength="1" maxlength="3">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Turno">Turno:</b>
                            @if(date('H')>=6 && date('H')<=12)
                                <input type="text" class="form-control input-border-bottom" name="Turno" id="Turno" value="1"
                                    readonly required>
                            @elseif(date('H')>=12 && date('H')<=19)
                                <input type="text" class="form-control input-border-bottom" name="Turno" id="Turno" value="2"
                                    readonly required>
                            @else
                                <input type="text" class="form-control input-border-bottom" name="Turno" id="Turno" value="3"
                                    readonly required>
                            @endif
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
                            <b class="ls-label-text" for="Data">Data do Movimento:</b>
                            <input type="text" class="form-control input-border-bottom" name="Data" id="Data" required
                                minlength="" maxlength="10" value="{{ date('Y-m-d') }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
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
