@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Telefone").mask("99-9999-9999");
        $("#Comercial").mask("99-9999-9999");
        $("#Celular").mask("99-99999-9999");
        $("#Data_Cadastro ").mask("99/99/9999");
        $("#Data_Nascimento").mask("99/99/9999");
        $("#RG").mask("9999999999999");
        $("#IM").mask("9999999999");
        $("#IE").mask("99999999999999");
        $("#IEST").mask("99999999999999");
        $("#LimiCred").mask("99999999.99");
        $("#PercDescAcresc").mask("99.99");
    });

</script>\
<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/Clifor") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de
                    @if($clifor->Tip=="C")
                        Cliente
                    @elseif($clifor->Tip=="F")
                        Fornecedor
                    @else
                        Cliente/Fornecedor
                    @endif
                </h4>
                <button id="btn1" type="button" class="btn btn-success">Salvar</button>
            </div>
            <div class="card-body">

                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("Clifor/salvar") }}"> @foreach($user as $u)
                                @if( $u->adm == Auth::user()->id )
                                     <option value="{{ $u->id }}">{{ $u->name }}</option>
                                 @endif
                             @endforeach
                        @else
                            <form method="post" action="{{ url("Clifor/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <label for="Nome_Fantasia">Nome Fantasia:</label>
                            <input type="text" class="form-control input-border-bottom" name="Nome_Fantasia"
                                id="Nome_Fantasia" placeholder="Nome Fantasia ou Apelido" minlength="4" maxlength="60"
                                value="{{ isset($clifor->Nome_Fantasia) ? $clifor->Nome_Fantasia : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="Razao_Social">Razão Social:</label>
                            <input type="text" class="form-control input-border-bottom" name="Razao_Social"
                                id="Razao_Social" placeholder="Razão Social" minlength="4" maxlength="60" 
                                value="{{ isset($clifor->Razao_Social) ? $clifor->Razao_Social : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="Fis_Jur">Tipo de Pessoa:</label>
                            <select onchange="verifica(this.value)" class="form-control input-border-bottom"
                                id="Fis_Jur" name="Fis_Jur">
                                <option
                                    value="{{ isset($clifor->Fis_Jur) ? $clifor->Fis_Jur : '' }} ">
                                    {{ $clifor->Fis_Jur=="F"?"Física":"Jurídica" }}
                                </option>
                                <option value="F">Física</option>
                                <option value="J">Jurídica</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="Data_Nascimento">Data de Nascimento:</label>
                            <input type="text" class="form-control input-border-bottom" name="Data_Nascimento"
                                id="Data_Nascimento"
                                value="{{ isset($clifor->Data_Nascimento) ? $clifor->Data_Nascimento : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#Data_Nascimento').datetimepicker({
                                        format: 'DD/MM/YYYY'
                                    });
                                });

                            </script>
                        </div>
                    </div>

                    <div class="form-row">
                        
                        <div class="form-group col-lg-2">
                            <label for="Estado_Civil">Estado Civil:</label>
                            <select class="form-control input-border-bottom" id="Estado_Civil"
                                name="Estado_Civil">
                                <option
                                    value="{{ isset($clifor->Estado_Civil) ? $clifor->Estado_Civil : '' }} ">
                                    @if($clifor->Estado_Civil=="C")
                                        Casado
                                    @elseif($clifor->Estado_Civil=="S")
                                        Solteiro
                                    @elseif($clifor->Estado_Civil=="D")
                                        Divorciado
                                    @else
                                        Viúvo
                                    @endif
                                </option>
                                <option value="S">Solteiro</option>
                                <option value="C">Casado</option>
                                <option value="V">Viuvo</option>
                                <option value="D">Divorciado</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="Sexo">Sexo:</label>
                            <select class="form-control input-border-bottom" id="Sexo" name="Sexo">
                                <option
                                    value="{{ isset($clifor->Sexo) ? $clifor->Sexo : '' }} ">
                                    {{ $clifor->Sexo=="M"?"Masculino":"Feminino" }}
                                </option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="Telefone">Telefone:</label>
                            <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone"
                                placeholder="00-0000-0000"
                                value="{{ isset($clifor->Telefone) ? $clifor->Telefone : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="">Celular:</label>
                            <input type="text" class="form-control input-border-bottom" name="Celular" id="Celular"
                                placeholder="00-00000-0000"
                                value="{{ isset($clifor->Celular) ? $clifor->Celular : '' }}">
                        </div>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="Comercial">Número Comercial ou Fax:</label>
                            <input type="text" class="form-control input-border-bottom" name="Comercial" id="Comercial"
                                placeholder="00-00000-0000"
                                value="{{ isset($clifor->Comercial) ? $clifor->Comercial : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    </div>

                <div class="form-row">
                    <div class="form-group col-lg-2">
                        <label for="CPF">CPF:</label>
                        <input type="text" class="form-control input-border-bottom" name="CPF" id="CPF" maxlength="14"
                            minlength="11" placeholder="Somente os números"
                            value="{{ isset($clifor->CPF) ? $clifor->CPF : '' }}"
                            onblur="validarCPF(this)">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="RG">RG:</label>
                        <input type="text" class="form-control input-border-bottom" name="RG" id="RG" maxlength="14"
                            min="8" placeholder="Somente os números"
                            value="{{ isset($clifor->RG) ? $clifor->RG : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="CNPJ">CNPJ:</label>
                        <input type="text" class="form-control input-border-bottom" name="CNPJ" id="CNPJ"
                            placeholder="Somente os números" maxlength="18"
                            value="{{ isset($clifor->CNPJ) ? $clifor->CNPJ : '' }}"
                            onblur="validarCNPJ(this)">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="IM">Incrição Municipal:</label>
                        <input type="text" class="form-control input-border-bottom" name="IM" id="IM" minlength="7"
                            maxlength="10"
                            value="{{ isset($clifor->IM) ? $clifor->IM : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="IE">Incrição Estadual:</label>
                        <input type="text" class="form-control input-border-bottom" name="IE" id="IE" minlength="9"
                            maxlength="13"
                            value="{{ isset($clifor->IE) ? $clifor->IE : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="IEST">Ins. Est. do Subst Tributario:</label>
                        <input type="text" class="form-control input-border-bottom" name="IEST" id="IEST" minlength="9"
                            maxlength="14"
                            value="{{ isset($clifor->IEST) ? $clifor->IEST : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <label for="Email">Email:</label>
                        <input type="email" class="form-control input-border-bottom" name="Email" id="Email"
                            placeholder="algo@algo.com"
                            value="{{ isset($clifor->Email) ? $clifor->Email : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="Site">Web Site:</label>
                        <input type="text" class="form-control input-border-bottom" name="Site" id="Site"
                            placeholder="www.algo.com"
                            value="{{ isset($clifor->Site) ? $clifor->Site : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Tip">Tipo:</label>
                        <select class="form-control input-border-bottom" id="Tip" name="Tip">
                            <option
                                value="{{ isset($clifor->Tip) ? $clifor->Tip : '' }} ">
                                @if($clifor->Tip=="C")
                                    {{ $clifor->Tip = "Cliente" }}
                                @elseif($clifor->Tip=="F")
                                    {{ $clifor->Tip = "Fornecedor" }}
                                @else
                                    {{ $clifor->Tip = "Cliente/Fornecedor" }}
                                @endif
                            </option>
                            <option value="C">Cliente</option>
                            <option value="F">Fornecedor</option>
                            <option value="A">Cliente/Fornecedor</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Class_ABC">Curva ABC:</label>
                        <select class="form-control input-border-bottom" id="Class_ABC" name="Class_ABC">
                            <option
                                value="{{ isset($clifor->Class_ABC) ? $clifor->Class_ABC : '' }} ">
                                {{ $clifor->Class_ABC }}</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
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
                    <div class="form-group col-lg-2">
                        <label for="Cli_Atacado">Atacadista?</label>
                        <select class="form-control input-border-bottom" id="Cli_Atacado" name="Cli_Atacado">
                            <option
                                value="{{ isset($clifor->Cli_Atacado) ? $clifor->Cli_Atacado : '' }} ">
                                {{ $clifor->Cli_Atacado==1?"Sim":"Não" }}
                            </option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Perfil">Perfil do Cliente:</label>
                        <select class="form-control input-border-bottom" id="Perfil" name="Perfil">
                            <option
                                value="{{ isset($clifor->Perfil) ? $clifor->Perfil : '' }} ">
                                {{ $clifor->Perfil==1?"Sim":"Não" }}
                            </option>
                            <option value="Consumidor">Consumidor</option>
                            <option value="Revenda">Revenda</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Profissao">Profissão:</label>
                        <input type="text" class="form-control input-border-bottom" name="Profissao" id="Profissao"
                            placeholder="Profissão do Cliente" maxlength="25" minlength="4"
                            value="{{ isset($clifor->Profissao) ? $clifor->Profissao : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Data_Cadastro">Data de Cadastro:</label>
                        <input type="text" class="form-control input-border-bottom date" name="Data_Cadastro"
                            id="Data_Cadastro" required
                            value="{{ isset($clifor->Data_Cadastro) ? $clifor->Data_Cadastro : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#Data_Cadastro').datetimepicker({
                                    format: 'DD/MM/YYYY'
                                });
                            });

                        </script>

                    </div>
                    <div class="form-group col-lg-2">
                        <label for="SitFinanc">Situação Financeira:</label>
                        <select class="form-control input-border-bottom" id="SitFinanc" name="SitFinanc">
                            <option
                                value="{{ isset($clifor->Perfil) ? $clifor->SitFinanc : '' }} ">
                                {{ $clifor->SitFinanc=="L"?"Livre":"Bloqueado" }}
                            </option>
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
                    <div class="form-group col-lg-2">
                        <label for="LimiCred">Limite de Crédito:</label>
                        <input type="text" class="form-control input-border-bottom" name="LimiCred" id="LimiCred"
                            placeholder="" onblur="lim_cred()"
                            value="{{ isset($clifor->LimiCred) ? $clifor->LimiCred : '' }}">
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
                        <label for="PercDescAcresc">Descontos ou Acréscimos:</label>
                        <input type="text" class="form-control input-border-bottom" name="PercDescAcresc"
                            id="PercDescAcresc" placeholder="" maxlength="3" onblur="desc_ac()"
                            value="{{ isset($clifor->PercDescAcresc) ? $clifor->PercDescAcresc : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Vendedor">Vendedor:</label>
                        <select class="form-control input-border-bottom" id="Vendedor" name="Vendedor">
                        @foreach($user as $u)
                                @if( $u->adm == Auth::user()->id )
                                    <option value="{{ $u->id }}" {{ $clifor->Vendedor == $u->id ? "selected" : "" }}>{{ $u->name }}</option>
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
                    <div class="form-group col-lg-2">
                        <label for="Local_UltMov">Local do Últ Mov:</label>
                        <select class="form-control input-border-bottom" id="Local_UltMov" name="Local_UltMov">
                            <option value="{{ isset($clifor->Local_UltMov) ? $clifor->Local_UltMov : '' }} ">
                            {{ $clifor->Local_UltMov == 'PED'? 'Pedido': $clifor->Local_UltMov }}
                            </option>
                            <option value="PED">Pedido</option>
                            <option value="OS">OS</option>
                            <option value="NF">NF</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Data_UltMov">Data do  Últ Mov:</label>
                        <input type="date" class="form-control input-border-bottom" name="Data_UltMov" id="Data_UltMov"
                            value="{{ isset($clifor->Data_UltMov) ? $clifor->Data_UltMov : '' }}">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="Empresa">Empresa:</label>
                        <select class="form-control input-border-bottom" id="Empresa" name="Empresa">
                            @foreach($empresa as $empresa)
                            @can('view_empresa', $empresa)
                                <option value="{{ $empresa->Codigo }}" {{ $clifor->Empresa == $empresa->Codigo ? "selected" : "" }}> {{ $empresa->Nome_Fantasia }}</option>
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
                        <label for="Ativo">Situação do Cadastro:</label>
                        <select class="form-control input-border-bottom" id="Ativo" name="Ativo">
                            <option
                                value="{{ isset($clifor->Ativo) ? $clifor->Ativo : '' }} ">
                                {{ $clifor->Ativo==1?"Ativo":"Inativo" }}
                            </option>
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
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
                    <div class="form-group col-lg-6">
                        <label for="Observacoes">Observções sobre o Cliente:</label>
                        <textarea type="text" class="form-control input-border-bottom " name="Observacoes"
                            id="Observacoes"
                            >{{ $clifor->Observacoes }}</textarea>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="Aviso">Aviso ao Cliente/Fornecedor:</label>
                        <textarea type="text" class="form-control input-border-bottom " name="Aviso"
                            id="Aviso"
                            value="">{{ $clifor->Aviso }}</textarea>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                </div>
                <!-- <div class="form-row">-->
                {{ csrf_field() }}
                <button id="btn2" class="btn btn-success">Salvar</button>
                <a href="{{ url("/Cadastro/Clifor") }}" class="btn btn-danger ml-3">Cancelar</a>
                </form>

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
            </div>

        </div>
    </div>
</div>
</div>


@endsection
<script>
    function verifica(value) {
        var cnpj = document.getElementById("CNPJ");
        var rg = document.getElementById("RG");
        var cpf = document.getElementById("CPF");

        if (value == "F") {
            cnpj.disabled = true;
            cnpj.placeholder = "P. Física (CNPJ não necessário)"
            rg.disabled = false;
            rg.placeholder = "Somente os Números"
            cpf.disabled = false;
            cpf.placeholder = "Somente os Números"
        } else if (value == "J") {
            cnpj.disabled = false;
            cnpj.placeholder = "Somente os Números"
            rg.disabled = true;
            rg.placeholder = "P. Jurídica (RG não necessário)"
            cpf.disabled = true;
            cpf.placeholder = "P. Jurídica (CPF não necessário)"
        }
    };

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
<script type="text/javascript">
    function _cnpj(cnpj) {

        cnpj = cnpj.replace(/[^\d]+/g, '');

        if (cnpj == '') return false;

        if (cnpj.length != 14)
            return false;


        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            return false;


        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) return false;
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;

        return true;

    }

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

    function validarCNPJ(el) {
        if (!_cnpj(el.value)) {

            alert("CNPJ inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
            //trata se for valido
            alert("Valido");
        }
    }

    function validarCPF(el) {
        if (!TestaCPF(el.value)) {

            alert("cpf inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
            //trata se for valido
            alert("Valido");
        }
    }
    function lim_cred() {
        var desc = parseFloat(document.getElementById('LimiCred').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('LimiCred').value = lim;
    }

    function desc_ac() {
        var desc = parseFloat(document.getElementById('PercDescAcresc').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('PercDescAcresc').value = lim;
    }

</script>
<script>
    function verifica(value) {
        var cnpj = document.getElementById("CNPJ");
        var rg = document.getElementById("RG");
        var cpf = document.getElementById("CPF");
        var razao = document.getElementById("Razao_Social");

        if (value == "F") {
            cnpj.disabled = true;
            cnpj.placeholder = "P. Física (CNPJ não necessário)"
            razao.disabled = true;
            razao.placeholder = "P. Física (Campo não necessário)"
            rg.disabled = false;
            rg.placeholder = "Somente os Números"
            cpf.disabled = false;
            cpf.placeholder = "Somente os Números"
            Sexo.disabled = false;
            Estado_Civil.disabled = false;
        } else if (value == "J") {
            cnpj.disabled = false;
            cnpj.placeholder = "Somente os Números"
            razao.disabled = false;
            razao.placeholder = "Razão Social"
            rg.disabled = true;
            rg.placeholder = "P. Jurídica (RG não necessário)"
            cpf.disabled = true;
            cpf.placeholder = "P. Jurídica (CPF não necessário)"
            Sexo.disabled = true;
            Estado_Civil.disabled = true;
        }
    };

</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
			$(document).ready(() => {
				$('#btn1').on('click', () => {
					$('#btn2').trigger('click')
				})
			})
		</script>