<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Saldo_Inicial").mask("99999999.99", {
            reverse: true
        });
        $("#Total_Ent").mask("99999999.99", {
            reverse: true
        });
        $("#Total_Sai").mask("99999999.99", {
            reverse: true
        });
        $("#Total_Dinheiro").mask("99999999.99", {
            reverse: true
        });
        $("#Total_Cheque").mask("99999999.99", {
            reverse: true
        });
        $("#Total_Cartao").mask("99999999.99", {
            reverse: true
        });
        $("#Total_Duplicata").mask("99999999.99", {
            reverse: true
        });




    });

</script>

<!-- Modal body -->
<div class="modal-body">
    <form method="post" class="needs-validation" novalidate
        action="{{ url("/Conta/saldo/salvar") }}">
        <div class="form-row">
            <div class="form-group col-lg-1" hidden>
                <label for="Cod_Conta">Conta:</label>
                <input type="text" class="form-control input-border-bottom" name="Cod_Conta" id="Cod_Conta"
                    value="{{ $contacadastro->Codigo }}" readonly>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Data">Data/Hora Abertura:</b>
                <input type="text" class="form-control  input-border-bottom" name="Data" id="Data"
                    value="{{ date('Y-m-d H:i:s') }}" readonly required>
                <div class="invalid-feedback">
                    Por Favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Turno">Turno de Movimento:</b>
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
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Saldo_Inicial">Saldo Inicial</b>
                <input type="text" class="form-control input-border-bottom" name="Saldo_Inicial" id="Saldo_Inicial"
                    minlength="1" maxlength="10" value="0.00" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Total_Ent">Total de Entrada</b>
                <input type="text" class="form-control input-border-bottom" name="Total_Ent" id="Total_Ent"
                    minlength="1" maxlength="10" value="0.00" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Total_Sai">Total de Saída</b>
                <input type="text" class="form-control input-border-bottom" name="Total_Sai" id="Total_Sai"
                    minlength="1" maxlength="10" value="0.00" required onblur="calcular()">
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Saldo_Final">Saldo Total: </b>
                <input type="text" class="form-control input-border-bottom" name="Saldo_Final" id="Saldo_Final"
                    minlength="1" maxlength="10" value="0.00" required readonly>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Total_Dinheiro">Total Dinheiro</b>
                <input type="text" class="form-control input-border-bottom" name="Total_Dinheiro" id="Total_Dinheiro"
                    minlength="1" maxlength="10" value="0.00" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Total_Cheque">Total Cheque</b>
                <input type="text" class="form-control input-border-bottom" name="Total_Cheque" id="Total_Cheque"
                    minlength="1" maxlength="10" value="0.00" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Total_Cartao">Total Cartão</b>
                <input type="text" class="form-control input-border-bottom" name="Total_Cartao" id="Total_Cartao"
                    minlength="1" maxlength="10" value="0.00" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Total_Duplicata">Total Duplicata</b>
                <input type="text" class="form-control input-border-bottom" name="Total_Duplicata" id="Total_Duplicata"
                    minlength="1" maxlength="10" value="0.00" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Tipo">Situação:</b>
                <select class="form-control input-border-bottom" id="Tipo" name="Tipo">
                    <option value="A">Aberto</option>
                    <option value="X">Ausente</option>
                    <option value="F">Fechado</option>
                </select>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Cod_Fun">Funcionário:</b>
                    <input type="text" class="form-control input-border-bottom" name="Cod_Fun" id="Cod_Fun"
                        minlength="1" maxlength="4" value="{{ Auth::user()->id }}" required readonly>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <div class="form-group col-lg-3">
                    <b class="ls-label-text" for="Empresa">Empresa:</b>
                    <input type="text" class="form-control input-border-bottom" name="Empresa" id="Empresa"
                        minlength="1" maxlength="4" value="{{ $contacadastro->Empresa }}" required readonly>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
            </div>

        </div>
        {{ csrf_field() }}
        <button class="btn btn-success"> Cadastrar</button>
    </form>
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
<script>
    function calcular() {
        var Saldo_Inicial = parseFloat(document.getElementById('Saldo_Inicial').value, 2);
        var Total_Ent = parseFloat(document.getElementById('Total_Ent').value, 2);
        var Total_Sai = parseFloat(document.getElementById('Total_Sai').value, 2);
        var total = Saldo_Inicial + Total_Ent - Total_Sai;
        total = total.toFixed(2);
        document.getElementById('Saldo_Final').value = total;
    }

</script>
