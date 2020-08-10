<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Contato com Clientes
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Telemarketing/salvar") }}"
                        onsubmit="return checkForm(this);">
                    
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
                        <div class="form-group col-lg-2"hidden>
                            <b class="ls-label-text" for="Cod_Func">Responsável:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Func" id="Cod_Func"
                                value="  {{ Auth::user()->id }}" readonly >
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
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
                            <b class="ls-label-text" for="Data">Data do Contato:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data" id="Data" required
                                minlength="" maxlength="10" value="{{ date('Y-m-d') }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3  mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="Agendou_Visita" name="Agendou_Visita"
                                            value="1">Agendou Visita
                                    </label>
                                </div>
                        </div>
                        <div class="form-group col-lg-3  mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="Agendou_Servico" name="Agendou_Servico"
                                            value="1">Agendou Serviço
                                    </label>
                                </div>
                        </div>
                        <div class="form-group col-lg-3  mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="Agendou_Atendimento" name="Agendou_Atendimento"
                                            value="1">Agendou Atendimento
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Data_Conclusao">Data do Conclusão do Contato:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data_Conclusao" id="Data_Conclusao" required
                                minlength="" maxlength="10" value="{{ date('Y-m-d') }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3 mt-3 ml-2">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="Concluso" name="Concluso"
                                            value="1">Contato Concluído
                                    </label>
                                </div>
                        </div>
                        </div>


                        <div class="form-row">
                        <div class="form-group col-lg-12">
                            <b class="ls-label-text" for="Assunto">Assunto abordado:</b>
                            <textarea type="text" class="form-control input-border-bottom" name="Assunto" id="Assunto"
                             placeholder=""></textarea>
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
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
                    <div class="form-row">
                        {{ csrf_field() }}
                        <button class="btn btn-success" name="cadastrar">Cadastrar</button>
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
