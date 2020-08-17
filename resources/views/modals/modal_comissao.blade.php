<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Condmissões</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/Comissao/salvar") }}">
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
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="OS_Ped">Pedido / OS:</b>
                                <select class="form-control input-border-bottom" id="OS_Ped" name="OS_Ped">
                                    <option value="0">Selecione</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Cod_Venda">Venda:</b>
                                <select class="form-control input-border-bottom" id="Cod_Venda" name="Cod_Venda">
                                    <option value="0">Selecione</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Cod_Fun">Funcionário:</b>
                                <select class="form-control input-border-bottom" id="Cod_Fun"
                                    name="Cod_Fun" required>
                                    <option value="0">Selecione</option>
                                    @foreach($funcionario as $u)
                                    @can('update_funcionario',$u)
                                            <option value="{{ $u->Codigo }}">{{ $u->Nome }}</option>
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
                                <b class="ls-label-text" for="Valor">Valor da Venda:</b>
                                <input type="text" class="form-control input-border-bottom" name="Valor"
                                    id="Valor" onblur="valor()" minlength="3"  maxlength="3" value="0.00">
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
                                <b class="ls-label-text" for="Cod_Item">Cod do Item:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Item"
                                    id="Cod_Item" required>
                                    <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Transacao">Transação:</b>
                                <input type="text" class="form-control input-border-bottom" name="Transacao"
                                    id="Transacao" required>
                                    <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Comissao">Comissão:</b>
                                <input type="text" class="form-control input-border-bottom" name="Comissao"
                                    id="Comissao" onblur="comissao()" minlength="3" value="0.00">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Data_Prev">Previsão para Pagamento:</b>
                                <input type="date" class="form-control input-border-bottom" name="Data_Prev"
                                    id="Data_Prev" required>
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
                                <b class="ls-label-text" for="Situacao">Situação:</b>
                                <select class="form-control input-border-bottom" id="Situacao" name="Situacao"required>
                                <option value="">Selecione</option>
                                    <option value="L">Livre</option>
                                    <option value="B">Bloqueado</option>
                                  
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Status">Status:</b>
                                <select class="form-control input-border-bottom" id="Status" name="Status" required>
                                <option value="">Selecione</option>
                                    <option value="A">Aberto</option>
                                    <option value="P">Pago</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Cod_Conta">Contas a Receber:</b>
                                <select class="form-control input-border-bottom" id="Cod_Conta"
                                    name="Cod_Conta" required>
                                    <option value="">Selecione</option>
                                    @foreach($contas_receber as $u)
                                    @can('view_ctas_receber', $u)
                                            <option value="{{ $u->Codigo }}"> {{ $u->Num_Doc }}</option>
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
                            <button class="btn btn-success">Cadastrar</button>
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
<script type="text/javascript">
    function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }
    function comissao() {
        var desc = parseFloat(document.getElementById('Comissao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Comissao').value = lim;
    }

</script>
