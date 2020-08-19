<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ajuste de Estoque</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/AjusteEstoque/salvar") }}">
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
                                <b class="ls-label-text" for="Data">Data do Ajuste</b>
                                <input type="date" class="form-control input-border-bottom" name="Data" id="Data"
                                    required maxlength="10"  value="{{ date('Y-m-d') }}">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Tipo_Mov">Tipo do Movimento</b>
                                <select class="form-control input-border-bottom" id="Tipo_Mov" name="Tipo_Mov">
                                    <option value="E">Entrada</option>
                                    <option value="S">Saída</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <b class="ls-label-text" for="Justificativa">Justificativa:</b>
                                <input type="text" class="form-control input-border-bottom" name="Justificativa"
                                    id="Justificativa" minlength="5" maxlength="50" required>
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
                                <b class="ls-label-text" for="Situacao">Tipo do Movimento</b>
                                <select class="form-control input-border-bottom" id="Situacao" name="Situacao">
                                    <option value="Aberto">Aberto</option>
                                    <option value="Executado">Executado</option>
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
                                        @if(auth()->user()->id == $u->adm)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endif
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
                                <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                                <select class="form-control input-border-bottom" id="Cod_CliFor" name="Cod_CliFor">
                                    <option value="0">Selecione</option>
                                    @foreach($clifor as $clifor)
                                        @can('view_clifor', $clifor)
                                            <option value="{{ $clifor->Codigo }}">{{ $clifor->Nome_Fantasia }}
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
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Empresa">Empresa:</b>
                                    <select class="form-control input-border-bottom" id="Empresa" name="Empresa">
                                        <option value="0">Selecione</option>
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
                            <button class="btn btn-success">Cadastrar</button>
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
