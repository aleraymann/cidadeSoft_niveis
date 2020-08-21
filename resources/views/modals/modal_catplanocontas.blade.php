<!-- The Modal -->
<div class="modal fade" id="myModalCat">
    <div class="modal-dialog  modal-md">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cat de Plano de Contas
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/CatPlanoContas/salvar") }}" onsubmit="return checkForm(this);">
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
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <b class="ls-label-text" for="Descricao">Descrição:</b>
                        <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao" placeholder=""
                            required minlength="" maxlength="15">
                        <div class="invalid-feedback">
                            Campo Obrigatório!!
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
