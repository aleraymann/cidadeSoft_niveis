<!-- The Modal -->
<div class="modal fade" id="myModaldata">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Movimento de Contas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/Movimento/salvar") }}">

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
                            <div class="form-group col-lg-3" hidden>
                                <b class="ls-label-text" for="data_id">Cod Data:</b>
                                <input type="text" class="form-control input-border-bottom" name="data_id" id="data_id"
                                    value="{{ $data_movimento->Codigo }}" readonly>
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Especie">Espécie do Movimento:</b>
                                <select class="form-control input-border-bottom" name="Especie" id="Especie" required>
                                    <option value="">Selecione</option>
                                    <option value="1">Dinheiro</option>
                                    <option value="2">Cheque</option>
                                    <option value="3">Cartão</option>

                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Documento">Tipo do Documento:</b>
                                <select class="form-control input-border-bottom" name="Documento" id="Documento"
                                    required>
                                    <option value="NFF">Nota Fiscal</option>
                                    <option value="REC">Recibo</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Num_Doc">Número do Documento:</b>
                                <input type="text" class="form-control input-border-bottom" name="Num_Doc" id="Num_Doc"
                                    maxlength="15" minlength="1" required>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Valor">Valor:</b>
                                <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor"
                                    minlength="3" maxlength="10" value="0.00" required onblur="valor()">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>




                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Nome_Clifor">Cliente/Fornecedor:</b>
                                <select class="form-control input-border-bottom" onchange="pesquisarCodigo()"
                                    name="Nome_Clifor" id="Nome_Clifor" required>
                                    <option value="">Selecione</option>
                                    @foreach($clifor as $clifor)
                                        @can('view_clifor', $clifor)
                                            <option value="{{ $clifor->Nome_Fantasia }}">
                                                {{ $clifor->Nome_Fantasia }}</option>
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


                            <div class="form-group col-lg-1">
                                <b class="ls-label-text" for="Cod_Clifor">Cod:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Clifor"
                                    id="Cod_Clifor" readonly>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Historico">Hist. do Movimento:</b>
                                <input type="text" class="form-control input-border-bottom" name="Historico"
                                    id="Historico" placeholder="" required minlength="3" maxlength="45">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 3 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Operador">Operador:</b>
                                <select class="form-control input-border-bottom" name="Operador" id="Operador" required>
                                    <option value="C">Crédito</option>
                                    <option value="D">Débito</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Plano_Ctas">Plano de Contas:</b>
                                <select class="form-control input-border-bottom" name="Plano_Ctas" required>
                                    <option value="0">Selecione</option>
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
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Cod_Conta">Conta:</b>
                                <select class="form-control input-border-bottom" name="Cod_Conta" id="Cod_Conta"
                                    required onchange="defineSub()">
                                    <option value="">Selecione</option>
                                    @foreach($conta as $conta)
                                        @can('view_conta', $conta)
                                            <option value="{{ $conta->Codigo }}">
                                                Ag:{{ $conta->Cod_Age }}-{{ $conta->Dig_Age }} /
                                                CC:{{ $conta->CC }}-{{ $conta->Digito }}</option>
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
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Cod_Conta_Saldo">Conta Saldo:</b>
                                <select class="form-control input-border-bottom" name="Cod_Conta_Saldo"
                                    id="Cod_Conta_Saldo" required>
                                    <option value="">Selecione</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Centro_Custo">Centro de Custo:</b>
                                <select class="form-control input-border-bottom" name="Centro_Custo" required>
                                    <option value="">Selecione</option>
                                    @foreach($custo as $custo)
                                        @can('view_centroCusto', $custo)
                                            <option value="{{ $custo->Codigo }}">{{ $custo->Descricao }}</option>
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
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Transacao">Transação:</b>
                                <input type="text" class="form-control input-border-bottom" name="Transacao"
                                    id="Transacao" minlength="2" maxlength="11" value="0" required>
                                <div class="invalid-feedback">
                                    Por favor, Minimo 2 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Empresa">Empresa:</b>
                                <select class="form-control input-border-bottom" name="Empresa" required>
                                    <option value="">Selecione</option>
                                    @foreach($empresa as $empresa)
                                        @can('view_empresa', $empresa)
                                            <option value="{{ $empresa->Codigo }}">{{ $empresa->Razao_Social }}
                                            </option>
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
    function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }

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
    function defineSub() {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var idConta = $('#Cod_Conta').val();
        $.ajax({
            url: '{{ url("Movimento/pesquisaSaldo") }}',
            type: 'POST',
            data: {
                '_method': 'POST',
                '_token': csrf_token,
                'id_conta': idConta
            },
            dataType: 'json',
            success: function (data) {
                if (!data) {
                    $('select[name=Cod_Conta_Saldo]').find("option").remove().end().append(
                        '<option value="">  </option>').val("");
                    return;
                } else {
                    $('select[name=Cod_Conta_Saldo]').empty();
                    for (index = 0; index < data.length; ++index) {
                        //console.log(data[index]);
                        $('select[name=Cod_Conta_Saldo]').empty().append('<option value="' + data[0][
                            'Codigo'
                        ] + '">' + data[0]['Data'] + '</option>');
                    }
                }
            },
        });
    }

</script>
<script>
    function pesquisarCodigo() {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute(
            'content'); // obrigatorio para qualqer pesquisa tanto get ou post 
        var nomeCli = $('#Nome_Clifor')
            .val(); // pega o valor marcado, lembra com o change(realiza a ação quando marca um)
        $.ajax({
            url: '{{ url("Movimento/pesquisa") }}', // qual é o link (funcao que vai fazer a consulta, tem q ter na rota)
            type: 'POST', // post ou get
            data: {
                '_method': 'POST',
                '_token': csrf_token,
                'nomeCliente': nomeCli
            }, // primeiro nome é como vai passar pro outro
            // repete post ou get(obrigatorio), token =>infoma o token que tem q ter em todo form   ,    e qual parametros vc vai passar tanto(nesse caso só o id laa)
            dataType: 'json', // tipo dos dados , em json ou xml array 
            success: function (data) { // se tiver sucesso faz codigo abaixo
                if (!data) {
                    //$('select[name=subcategory_id]').find("option").remove().end().append('<option value="">  </option>').val("");
                    document.getElementById('Cod_Clifor').value =
                        ''; //se nao retornar nada , no caso deu erro lá no codigo
                    return;
                } else {
                    //$('select[name=subcategory_id]').empty(); isso é pro subcategoria , toda vez q pesquisa ele zera pra mostrar os novos dados
                    /*for (index = 0; index < data.length; ++index) {
                        //console.log(data[index]);
                        $('select[name=subcategory_id]').empty().append('<option value="'+data[0]['id']+'">'+data[0]['descricao']+'</option>');
                    }*/ //vai retornar apenas um dado, nao um loop

                    document.getElementById('Cod_Clifor').value = data;
                    console.log(data); // só pra debug mesmo dps vc tira

                }
            },
        });
    }

</script>
