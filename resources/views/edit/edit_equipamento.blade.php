@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/equipamento") }}" class="btn btn-primary ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Equipamento
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{ url("/Equipamento/salvar/$id") }}"
                        enctype="multipart/form-data">

                        <div class=" form-row">
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Foto">Foto Atual:</b><br>
                                @if($equipamento->Foto != null)
                                    <img src="{{ url("storage/equipamentos/{$equipamento->Foto }") }}"
                                        style="max-width:100px; height:100px">
                                @else
                                    <img src="{{ url("img/empresa_padrao.jpg") }}"
                                        style="max-width:100px; height:100px">
                                @endif

                            </div>
                            <div class="form-group col-lg-5 mr-2">
                                <b class="ls-label-text" for="Foto">Alterar Foto:</b>
                                <input type="file" class="form-control" name="Foto" id="Foto">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <input type="hidden" name='LogoBanco' value='{{ $equipamento->Foto }}'>
                       
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom" name="Cod_CliFor" required>
                                <option value="">Selecione</option>
                                @foreach($clifor as $clifor)
                                    @can('view_clifor', $clifor)
                                    <option value="{{ $clifor->Codigo }}" {{ $equipamento->Cod_CliFor == $clifor->Codigo ? "selected" : "" }}>
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
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Nro_Serie">Num de Serie ou Chassis:</b>
                        <input type="text" class="form-control input-border-bottom" name="Nro_Serie" id="Nro_Serie"
                            placeholder="" required minlength="4" maxlength="45" value="{{ isset($equipamento->Nro_Serie) ? $equipamento->Nro_Serie : '' }} ">
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
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Placa) ? $equipamento->Placa : '' }} ">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="Equipamento">Descrição do Equipamento:</b>
                        <input type="text" class="form-control input-border-bottom" name="Equipamento" id="Equipamento"
                            placeholder="" required minlength="" maxlength=""  value="{{ isset($equipamento->Equipamento) ? $equipamento->Equipamento : '' }} ">
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
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Marca) ? $equipamento->Marca : '' }} ">
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
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Modelo) ? $equipamento->Modelo : '' }} ">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Nro_Frota">Num do Equip na Frota:</b>
                        <input type="text" class="form-control input-border-bottom" name="Nro_Frota" id="Nro_Frota"
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Nro_Frota) ? $equipamento->Nro_Frota : '' }} ">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Fabricacao">Ano de Fabricação:</b>
                        <input type="text" class="form-control input-border-bottom" name="Fabricacao" id="Fabricacao"
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Fabricacao) ? $equipamento->Fabricacao : '' }} ">
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
                        <input type="text" class="form-control input-border-bottom" name="Combustivel" id="Combustivel"
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Combustivel) ? $equipamento->Combustivel : '' }} ">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-5">
                        <b class="ls-label-text" for="Acessorios">Acesssórios:</b>
                        <input type="text" class="form-control input-border-bottom" name="Acessorios" id="Acessorios"
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Acessorios) ? $equipamento->Acessorios : '' }} ">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Estado">Estado de Conservação:</b>
                        <input type="text" class="form-control input-border-bottom" name="Estado" id="Estado"
                            placeholder="" minlength="" maxlength=""  value="{{ isset($equipamento->Estado) ? $equipamento->Estado : '' }} ">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
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

                    function comissao() {
                        var desc = parseFloat(document.getElementById('Cotacao').value, 2);
                        lim = desc.toFixed(2);
                        document.getElementById('Cotacao').value = lim;
                    }

                </script>
                <div class="form-row">

                    {{ csrf_field() }}
                    <button class="btn btn-success">Salvar</button>
                    <a href="{{ url("/Cadastro/equipamento") }}"
                        class="btn btn-danger ml-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
