<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Cargos
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Role/salvar") }}" onsubmit="return checkForm(this);">
                    @else
                        <form method="post" action="{{ url("/Role/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif
               
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="name">Nome do Cargo:</b>
                        <input type="text" class="form-control input-border-bottom" name="name" id="name" placeholder=""
                            required minlength="4">
                        <div class="invalid-feedback">
                            Campo Obrigatório
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="label">Descrição:</b>
                        <input type="text" class="form-control input-border-bottom" name="label" id="label"
                            placeholder="" required minlength="4">
                        <div class="invalid-feedback">
                            Campo Obrigatório
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
