<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Equipamento
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/Equipamento/salvar") }}" enctype="multipart/form-data"
        onsubmit="return checkForm(this);">
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
                            <div class="form-group col-lg-6">
                                <b class="ls-label-text" for="Foto">Foto:</b>
                                <input type="file" class="form-control" name="Foto" id="Foto">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3 ml-2">
                                <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                                <select class="form-control input-border-bottom" name="Cod_CliFor" required>
                                    <option value="">Selecione</option>
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Nro_Serie">Num de Serie ou Chassis:</b>
                                <input type="text" class="form-control input-border-bottom" name="Nro_Serie"
                                    id="Nro_Serie" placeholder="" required minlength="4" maxlength="45">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Placa">Placa:</b>
                                <input type="text" class="form-control input-border-bottom" name="Placa" id="Placa"
                                    placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <b class="ls-label-text" for="Equipamento">Descrição do Equipamento:</b>
                                <input type="text" class="form-control input-border-bottom" name="Equipamento"
                                    id="Equipamento" placeholder="" required minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Marca">Marca:</b>
                                <input type="text" class="form-control input-border-bottom" name="Marca" id="Marca"
                                    placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Modelo">Modelo:</b>
                                <input type="text" class="form-control input-border-bottom" name="Modelo" id="Modelo"
                                    placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Nro_Frota">Num do Equip na Frota:</b>
                                <input type="text" class="form-control input-border-bottom" name="Nro_Frota"
                                    id="Nro_Frota" placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Fabricacao">Ano de Fabricação:</b>
                                <input type="text" class="form-control input-border-bottom" name="Fabricacao"
                                    id="Fabricacao" placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Combustivel">Combustível:</b>
                                <input type="text" class="form-control input-border-bottom" name="Combustivel"
                                    id="Combustivel" placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-5">
                                <b class="ls-label-text" for="Acessorios">Acessórios:</b>
                                <input type="text" class="form-control input-border-bottom" name="Acessorios"
                                    id="Acessorios" placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Estado">Estado de Conservação:</b>
                                <input type="text" class="form-control input-border-bottom" name="Estado"
                                    id="Estado" placeholder="" minlength="" maxlength="">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>

                        <script src=" https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
