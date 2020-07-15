<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Celular").mask("99-99999-9999");
        $("#CPF").mask("99999999999");
        $("#RG").mask("9999999999999");
    });

</script>

<!-- Modal body -->
<div class="modal-body">
    <form method="post" class="needs-validation" novalidate
        action="{{ url("/Clifor/contato/salvar") }}" onsubmit="return checkForm(this);">
        <div class="form-row">
            <div class="form-group col-lg-12" hidden>
                <b class="ls-label-text" for="RG">User_ID:</b>
                <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id" readonly
                    value="{{ Auth::user()->id }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-1" hidden>
                <label for="Cod_CliFor">Nome do Cliente:</label>
                <input type="text" class="form-control input-border-bottom" name="Cod_CliFor" id="Cod_CliFor"
                    value="{{ $clifor->Codigo }}" readonly>
            </div>
            <div class="form-group col-lg-2">
                <label for="Tipo">Tipo de Contato</label>
                <input type="text" class="form-control input-border-bottom" name="Tipo" id="Tipo"
                    placeholder="Avô, Pai, Sócio, etc." required minlength="3" maxlength="10">
                <div class="invalid-feedback">
                    Máximo 10 caracteres!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>

            <div class="form-group col-lg-2">
                <label for="Setor">Setor para Contato</label>
                <select class="form-control input-border-bottom" id="Setor" name="Setor" required>
                    <option></option>
                    <option value="Vendas">Vendas</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Fiscal">Fiscal</option>
                </select>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for="Nome">Nome Completo</label>
                <input type="text" class="form-control input-border-bottom" name="Nome" id="Nome"
                    placeholder="Nome completo" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <label for="Data_Nasc">Data de nascimento</label>
                <input type="text" class="form-control input-border-bottom" name="Data_Nasc" id="Data_Nasc" placeholder="DD/MM/AAAA" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <script type="text/javascript">
            $(function () {
                $('#Data_Nasc').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            </script>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-2">
                <label for="RG">RG do Contato</label>
                <input type="text" class="form-control input-border-bottom" name="RG" id="RG" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <label for="CPF">CPF do contato</label>
                <input type="text" class="form-control input-border-bottom" name="CPF" id="CPF" required
                    onblur="validarCPF(this)">
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <label for="Celular">Celular</label>
                <input type="text" class="form-control input-border-bottom" name="Celular" id="Celular" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for="Email">Email:</label>
                <input type="email" class="form-control input-border-bottom" name="Email" id="Email" required>
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
        <!-- <div class="form-row">-->
        {{ csrf_field() }}
        <button class="btn btn-success" name="cadastrar"> Salvar</button>
    </form>
</div>
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


    function validarCPF(el) {
        if (!TestaCPF(el.value)) {

            alert("CPF inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {

        }
    }

</script>
