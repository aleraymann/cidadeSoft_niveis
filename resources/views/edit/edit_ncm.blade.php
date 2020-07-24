@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#AliqIBPT").mask("9.99");
        $("#AliqImp").mask("9.99");
        $("#AliqEst").mask("9.99");
        $("#AliqMun").mask("9.99");
        $("#Ex").mask("99999");
        $("#Tipo").mask("99");
    });

</script>

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/ncm") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Ncm
                </h4>
            </div>
            <div class="card-body">

                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Ncm/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Ncm/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif

                    <div class="form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="NCM">NCM:</b>
                            <input type="text" class="form-control input-border-bottom" name="NCM" id="NCM"
                                placeholder="" required minlength="" maxlength="10"
                                value="{{ isset($ncm->NCM) ? $ncm->NCM : '' }} ">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Descricao">Descrição:</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                                placeholder="" required minlength="4" maxlength="60"
                                value="{{ isset($ncm->Descricao) ? $ncm->Descricao : '' }} ">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="AliqIBPT">Aliquota IBPT:</b>
                            <input type="text" class="form-control input-border-bottom" name="AliqIBPT" id="AliqIBPT"
                                maxlength="3" minlength="1" onblur="aliqIBPT()"
                                value="{{ isset($ncm->AliqIBPT) ? $ncm->AliqIBPT : '' }}"
                                required>
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
                                maxlength="3" minlength="1" onblur="aliqImp()"
                                value="{{ isset($ncm->AliqImp) ? $ncm->AliqImp : '' }}"
                                required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="AliqEst">Aliquota Estadual:</b>
                            <input type="text" class="form-control input-border-bottom" name="AliqEst" id="AliqEst"
                                maxlength="3" minlength="1" onblur="aliqEst()"
                                value="{{ isset($ncm->AliqEst) ? $ncm->AliqEst : '' }}">
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
                            <b class="ls-label-text" for="AliqMun">Aliquota Municipal:</b>
                            <input type="text" class="form-control input-border-bottom" name="AliqMun" id="AliqMun"
                                maxlength="3" minlength="1"  onblur="aliqMun()"
                                value="{{ isset($ncm->AliqMun) ? $ncm->AliqMun : '' }}">
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
                                required minlength="" maxlength="5"
                                value="{{ isset($ncm->Ex) ? $ncm->Ex : '' }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Tipo">Tipo:</b>
                            <input type="text" class="form-control input-border-bottom" name="Tipo" id="Tipo"
                                placeholder="" required minlength="" maxlength="2"
                                value="{{ isset($ncm->Tipo) ? $ncm->Tipo : '' }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="VigenciaIni">Início da Vigência:</b>
                            <input type="text" class="form-control input-border-bottom" name="VigenciaIni"
                                id="VigenciaIni"
                                value="{{ isset($ncm->VigenciaIni) ? $ncm->VigenciaIni : '' }}">
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
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="VigenciaFim">Fim da Vigência:</b>
                            <input type="text" class="form-control input-border-bottom" name="VigenciaFim"
                                id="VigenciaFim"
                                value="{{ isset($ncm->VigenciaFim) ? $ncm->VigenciaFim : '' }}">
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
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Versao">Versão da Tabela IBPT:</b>
                            <input type="text" class="form-control input-border-bottom" name="Versao" id="Versao"
                                placeholder="" required minlength="2" maxlength="6"
                                value="{{ isset($ncm->Versao) ? $ncm->Versao : '' }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 2 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Chave">Chave IBPT:</b>
                            <input type="text" class="form-control input-border-bottom" name="Chave" id="Chave"
                                placeholder="" required minlength="2" maxlength="6"
                                value="{{ isset($ncm->Chave) ? $ncm->Chave : '' }}">
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
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/ncm") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
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