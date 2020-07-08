<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Atribuiçao de Cargos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Role_user/salvar") }}" onsubmit="return checkForm(this);">
                    @else
                        <form method="post" action="{{ url("/Role_user/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="name">Cargo:</b>
                        <select class="form-control input-border-bottom" id="role_id" name="role_id">
                            <option value="0">Selecione</option>
                            @foreach($role as $role)
                                <option value="{{ $role->id }}">{{ $role->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="label">Usuário:</b>
                        <select class="form-control input-border-bottom" id="user_id" name="user_id">
                            <option value="0">Selecione</option>
                            @foreach($totUsers as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
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
