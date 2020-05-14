<!-- The Modal -->
<div class="modal" id="myModalUser">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Usuários</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            <div class="login-form">
                <div class="form-group col-lg-12">
                    <label for="tipo">Tipo:</label>
                    <select onchange="verifica(this.value)" class="form-control input-border-bottom" id="tipo"
                        name="tipo">
                        <option value="A">Administrador</option>
                        <option value="F">Funcionario</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input-border-bottom"
                                name="name" value="{{ old('name') }}" required autofocus>
                            <label for="password" class="placeholder">Nome</label>
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-border-bottom"
                                name="email" value="{{ old('email') }}" required>
                            <label for="password" class="placeholder">E-mail</label>
                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-border-bottom"
                                name="password" required>
                            <label for="password" class="placeholder">Senha</label>
                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="password-confirm" type="password" class="form-control input-border-bottom"
                                name="password_confirmation" required>
                            <label for="password" class="placeholder">Confirme sua Senha</label>
                        </div>
                    </div>
                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="empresa" type="empresa" class="form-control input-border-bottom" name="empresa"
                                placeholder="Cod da empresa a ser vinculado" hidden>

                        </div>
                    </div>
                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="adm" type="adm" class="form-control input-border-bottom" name="adm"
                                placeholder="Cod do Administrador" hidden>

                        </div>
                    </div>

                    <div class="form-action">
                        <a href="{{ url("/") }}" id="show-signin"
                            class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
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
<script>
    function verifica(value) {
        var tipo = document.getElementById("tipo");

        if (value == "A") {
            empresa.hidden = true;
            adm.hidden = true;
        } else if (value == "F") {
            empresa.hidden = false;
            adm.hidden = false;
        }
    };

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#empresa").mask("9999");
    });

</script>