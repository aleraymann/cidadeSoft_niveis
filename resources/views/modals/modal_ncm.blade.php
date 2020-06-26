<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de NCM
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Ncm/salvar") }}" onsubmit="return checkForm(this);">
                    @else
                        <form method="post" action="{{ url("/Ncm/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif
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
                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="NCM">NCM:</b>
                        <input type="text" class="form-control input-border-bottom" name="NCM" id="NCM" placeholder=""
                            required minlength="" maxlength="10">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Descricao">Descrição:</b>
                        <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                            placeholder="" required minlength="4" maxlength="60">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="AliqIBPT">Aliquota de Imposto IBPT:</b>
                        <input type="text" class="form-control input-border-bottom" name="AliqIBPT" id="AliqIBPT"
                            maxlength="3" minlength="1" value="0.00" required onblur="aliqIBPT()">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="AliqImp">Aliquota Importado:</b>
                        <input type="text" class="form-control input-border-bottom" name="AliqImp" id="AliqImp"
                            maxlength="3" minlength="1" value="0.00" required  onblur="aliqImp()">
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
                        <b class="ls-label-text" for="AliqEst">Aliquota Estadual:</b>
                        <input type="text" class="form-control input-border-bottom" name="AliqEst" id="AliqEst"
                            maxlength="3" minlength="1" value="0.00"  onblur="aliqEst()">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="AliqMun">Aliquota Municipal:</b>
                        <input type="text" class="form-control input-border-bottom" name="AliqMun" id="AliqMun"
                            maxlength="3" minlength="1" value="0.00" onblur="aliqMun()">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <b class="ls-label-text" for="Ex">Ex:</b>
                        <input type="text" class="form-control input-border-bottom" name="Ex" id="Ex" placeholder=""
                            required minlength="" maxlength="5">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <b class="ls-label-text" for="Tipo">Tipo:</b>
                        <input type="text" class="form-control input-border-bottom" name="Tipo" id="Tipo" placeholder=""
                            required minlength="" maxlength="2">
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
                        <b class="ls-label-text" for="VigenciaIni">Início da Vigência:</b>
                        <input type="text" class="form-control input-border-bottom" name="VigenciaIni" id="VigenciaIni" placeholder="DD/MM/AAAA">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                        <script type="text/javascript">
            $(function () {
                $('#VigenciaIni').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        </script>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="VigenciaFim">Fim da Vigência:</b>
                        <input type="text" class="form-control input-border-bottom" name="VigenciaFim" id="VigenciaFim" placeholder="DD/MM/AAAA">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                        <script type="text/javascript">
            $(function () {
                $('#VigenciaFim').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        </script>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Versao">Versão da Tabela IBPT:</b>
                        <input type="text" class="form-control input-border-bottom" name="Versao" id="Versao"
                            placeholder="" required minlength="2" maxlength="6">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 2 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Chave">Chave IBPT:</b>
                        <input type="text" class="form-control input-border-bottom" name="Chave" id="Chave"
                            placeholder="" required minlength="2" maxlength="6">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 2 caracteres!
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
 
 function aliqIBPT() {
        var desc = parseFloat(document.getElementById('AliqIBPT').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('AliqIBPT').value = lim;
    }
    function aliqImp() {
        var desc = parseFloat(document.getElementById('AliqImp').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('AliqImp').value = lim;
    }
    function aliqEst() {
        var desc = parseFloat(document.getElementById('AliqEst').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('AliqEst').value = lim;
    }
    function aliqMun() {
        var desc = parseFloat(document.getElementById('AliqMun').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('AliqMun').value = lim;
    }
</script>