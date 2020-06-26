<!-- The Modal -->
<div class="modal" id="ModalPerm">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Atribuir Permissões a Cargos
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Permission_role/salvar") }}" onsubmit="return checkForm(this);">
                    @else
                        <form method="post" action="{{ url("/Permission_role/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif
               
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="role_id">Cargo:</b>
                        <select class="form-control input-border-bottom" id="role_id" name="role_id">
                            <option value="0">Selecione</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="permission_id">Permissão:</b>
                        <select class="form-control input-border-bottom" id="permission_id" name="permission_id">
                            <option value="0">Selecione</option>
                            @foreach($totpermissions as $perm)
                                <option value="{{ $perm->id }}">{{ $perm->label }}</option>
                            @endforeach
                        </select>
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
