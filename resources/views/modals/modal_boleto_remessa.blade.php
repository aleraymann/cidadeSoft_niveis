<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Boleto Remessa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Boleto_remessa/salvar") }}" onsubmit="return checkForm(this);">
                   
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data">Data da Remessa:</b>
                            <input type="text" class="form-control input-border-bottom" name="Data" id="Data"
                                value="{{ date('Y-m-d') }}" required readonly>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Hora">Hora da Remessa:</b>
                            <input type="text" class="form-control input-border-bottom" name="Hora" id="Hora"
                                value="{{ date(' H:i:s') }}" readonly required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Numero_Rem">Numero da Remessa</b>
                            <input type="text" class="form-control input-border-bottom" name="Numero_Rem"
                                id="Numero_Rem" placeholder="" required minlength="" maxlength="11">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Conv">Convênio da Cobrança</b>
                            <select class="form-control input-border-bottom"
                                name="Cod_Conv" required>
                                <option value="0">Selecione</option>
                                @foreach($convenio as $convenio)
                                    @can("view_convenio",$convenio)
                                        <option value="{{ $convenio->Codigo }}">{{ $convenio->Convenio }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Arquivo">Caminho do Arquivo:</b>
                            <input type="text" class="form-control input-border-bottom" name="Arquivo" id="Arquivo"
                                required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>

                    </div>

                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success" name="cadastrar">Cadastrar</button>
                        <input class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos' />
                        </form>
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

                <!-- Modal footer -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function TestaCPF(strCPF) {
            var Soma;
            var Resto;
            Soma = 0;
            if (strCPF == "00000000000") return false;
            if (strCPF == "11111111111") return false;
            if (strCPF == "22222222222") return false;
            if (strCPF == "33333333333") return false;
            if (strCPF == "44444444444") return false;
            if (strCPF == "55555555555") return false;
            if (strCPF == "66666666666") return false;
            if (strCPF == "77777777777") return false;
            if (strCPF == "88888888888") return false;
            if (strCPF == "99999999999") return false;

            for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11)) Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10))) return false;

            Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11)) Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11))) return false;
            return true;
        }
        alert(TestaCPF(strCPF));

        function validarCNPJ(el) {
            if (!_cnpj(el.value)) {

                alert("CNPJ inválido! - " + el.value);

                // apaga o valor
                el.value = "";
            } else {
                //trata se for valido
                alert("Valido");
            }
        }

        function validarCPF(el) {
            if (!TestaCPF(el.value)) {

                alert("CPF inválido! - " + el.value);

                // apaga o valor
                el.value = "";
            } else {
                //trata se for valido
                alert("Valido");
            }
        }

    </script>
