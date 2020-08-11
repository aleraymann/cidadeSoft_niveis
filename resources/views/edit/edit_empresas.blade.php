@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript"> 
  jQuery(function($){
   $("#Telefone").mask("99-9999-9999");
   $("#Celular").mask("99-99999-9999");
   $("#FAX").mask("99-9999-9999");
   $("#CEP").mask("99999999");
   $("#CPF").mask("999.999.999-99");
   $("#RG").mask("9999999999999");
   $("#CNPJ").mask("99.999.999/9999-99");
   $("#SMTP_Porta").mask("99999");
   $("#CNAE").mask("9999999999");
   $("#FTP_Porta").mask("99999");
   $("#Fin_CFixos").mask("9.99");
   $("#Fin_Desloc").mask("9.99");
   $("#Fin_Comissao").mask("9.99");
   $("#Fin_Inad").mask("9.99");       
   $("#Fin_Lucro").mask("9.99");       
   $("#Fin_DescPV").mask("9.99");       
   $("#Fin_PerDano").mask("9.99");       
   $("#Fin_JurosPadrao").mask("9.99");
   $("#Fin_MultaPadrao").mask("9.99");       
   $("#Fisc_ICMS").mask("9.99");
   $("#Fisc_PIS").mask("9.99");
   $("#Fisc_COFINS").mask("9.99");
   $("#Fisc_ISSQN").mask("9.99");
   $("#Fisc_IRPJ").mask("9.99");
   $("#Fisc_CSLL").mask("9.99");
   $("#Fisc_Simples").mask("9.99");
   $("#NFe_Porta").mask("99999");
   $("#NFe_Modelo").mask("999");
   $("#NFe_Versao").mask("9.99");
   $("#NFCe_Modelo").mask("999");
   $("#NFCe_Versao").mask("9.99");
   $("#NFCe_idToken").mask("99999999999");
   $("#Ctb_contCPF").mask("99999999999");
   $("#Ctb_ContFone").mask("99-9999-9999");
   $("#Vend_DiasLocacao").mask("99999");
   $("#Vend_ProgPtos").mask("99999999.99");
   $("#Vend_VlrHora").mask("99999999.99");
   $("#Vend_VlrMinimo").mask("99999999.99");
   $("#CliFor_Saida").mask("99999");
   $("#CliFor_Entrada").mask("99999");                   
 });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Adicionando Javascript CEP-->
<script type="text/javascript" >
 $(document).ready(function() {
   function limpa_formulário_cep() {
               // Limpa valores do formulário de cep.
               $("#Endereco").val("");
               $("#Bairro").val("");
               $("#Cidade").val("");
               $("#Estado").val("");
               $("#Cod_IBGE").val("");
             }

           //Quando o campo cep perde o foco.
           $("#CEP").blur(function() {
             
               //Nova variável "cep" somente com dígitos.
               var cep = $(this).val().replace(/\D/g, '');
               
               //Verifica se campo cep possui valor informado.
               if (cep != "") {
                 
                   //Expressão regular para validar o CEP.
                   var validacep = /^[0-9]{8}$/;
                   
                   //Valida o formato do CEP.
                   if(validacep.test(cep)) {
                     
                       //Preenche os campos com "..." enquanto consulta webservice.
                       $("#Endereco").val("...");
                       $("#Bairro").val("...");
                       $("#Cidade").val("...");
                       $("#Estado").val("...");
                       $("#Cod_IBGE").val("...");
                       
                       //Consulta o webservice viacep.com.br/
                       $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                         
                         if (!("erro" in dados)) {
                               //Atualiza os campos com os valores da consulta.
                               $("#Endereco").val(dados.logradouro);
                               $("#Bairro").val(dados.bairro);
                               $("#Cidade").val(dados.localidade);
                               $("#Estado").val(dados.uf);
                               $("#Cod_IBGE").val(dados.ibge);
                               
                           } //end if.
                           else {
                               //CEP pesquisado não foi encontrado.
                               limpa_formulário_cep();
                               alert("CEP não encontrado.");
                             }
                           });
                   } //end if.
                   else {
                       //cep é inválido.
                       limpa_formulário_cep();
                       alert("Formato de CEP inválido.");
                     }
               } //end if.
               else {
                   //cep sem valor, limpa formulário.
                   limpa_formulário_cep();
                 }
               });
         });
 
       </script>
     <div class="main-panel" style="margin-top:60px">
     <a href="{{ url("/Cadastro/empresas") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
      <div class="col-md-12">
      <div class="card">
      <div class="card-header">
     
      <h4 class="card-title">
                    Edição de Empresas
                </h4>
                <button id="btn1" type="button" class="btn btn-success">Salvar</button>
                </div>
      <div class="modal-body">
        @if(!isset($id))
        <form method="post" class="needs-validation" novalidate action="{{url("/Empresa/salvar")}}">
         @else
         <form method="post" action="{{url("/Empresa/salvar/$id")}}" enctype="multipart/form-data">
          @endif
          <div class="form-row">
          <div class="form-group col-lg-4">
              <b class="ls-label-text" for="Logo">Logo Atual:</b><br>
              @if($empresa->Logo != null)
              <img src="{{ url("storage/empresas/{$empresa->Logo}") }}"   style="max-width:100px; height:100px" >
							@else
								<img src="{{url("img/empresa_padrao.jpg")}}"  style="max-width:100px; height:100px">
							@endif
             
            </div>
          <div class="form-group col-lg-6">
              <b class="ls-label-text" for="Logo">Alterar Logo:</b>
              <input type="file" class="form-control" name="Logo" id="Logo">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
              <input type="hidden" name='LogoBanco' value='{{ $empresa->Logo }}'> 
          </div>
          <div class="form-row">
            <div class="form-group col-lg-4">
              <label for="Nome_Fantasia">Nome Fantasia:</label>
              <input type="text" class="form-control input-border-bottom" name="Nome_Fantasia" id="Nome_Fantasia"
              placeholder="Nome Fantasia ou Apelido" required minlength="4" maxlength="60" 
              value="{{isset($empresa->Nome_Fantasia) ? $empresa->Nome_Fantasia : '' }}" >
              <div class="invalid-feedback">
                Campo Obrigatório, Mínimo 4 caracteres!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="Razao_Social">Razão Social:</label>
              <input type="text" class="form-control input-border-bottom" name="Razao_Social" id="Razao_Social"
              placeholder="Razão Social" required  minlength="4" maxlength="60"  
              value="{{isset($empresa->Razao_Social) ? $empresa->Razao_Social : '' }}" >
              <div class="invalid-feedback">
                Campo Obrigatório, Mínimo 4 caracteres!!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="CEP">CEP:</label>
              <input type="text" class="form-control input-border-bottom" name="CEP" id="CEP" placeholder="000000000"  
              value="{{isset($empresa->CEP) ? $empresa->CEP : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>      
            </div>
            <div class="form-group col-lg-2">
              <label for="Cod_IBGE">Codigo IBGE:</label>
              <input type="number" class="form-control input-border-bottom" name="Cod_IBGE" id="Cod_IBGE"
              placeholder=""  value="{{isset($empresa->Cod_IBGE) ? $empresa->Cod_IBGE : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-5">
              <label for="Endereco">Endereço:</label>
              <input type="text" class="form-control input-border-bottom" name="Endereco" id="Endereco"
              placeholder="Rua, Travessa, Avenida"  value="{{isset($empresa->Endereco) ? $empresa->Endereco : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-1">
              <label for="Numero">Número:</label>
              <input type="number" class="form-control input-border-bottom" name="Numero" id="Numero" 
              value="{{isset($empresa->Numero) ? $empresa->Numero : '' }}" >
              <div class="invalid-feedback" >
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="Bairro">Bairro: </label>
              <input type="text" class="form-control input-border-bottom" name="Bairro" id="Bairro" 
              value="{{isset($empresa->Bairro) ? $empresa->Bairro : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="Cidade">Cidade:</label>
              <input type="text" class="form-control input-border-bottom" name="Cidade" id="Cidade"  
              value="{{isset($empresa->Cidade) ? $empresa->Cidade : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="Estado">Estado:</label>
              <input type="text" class="form-control input-border-bottom" name="Estado" id="Estado" minlength="2" maxlength="2" placeholder="Sigla"
              value="{{isset($empresa->Sigla) ? $empresa->Sigla : '' }}" >
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
              <label for="Telefone">Telefone Principal</label>
              <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone"  
              value="{{isset($empresa->Telefone) ? $empresa->Telefone : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            
            <div class="form-group col-lg-2">
              <label for="Celular">Celular de Plantão</label>
              <input type="text" class="form-control input-border-bottom" name="Celular" id="Celular"  
              value="{{isset($empresa->Celular) ? $empresa->Celular : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            
            <div class="form-group col-lg-2">
              <label for="FAX">Fax</label>
              <input type="text" class="form-control input-border-bottom" name="FAX" id="FAX"  value="{{isset($empresa->FAX) ? $empresa->FAX : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-3">
              <label for="Email">Email:</label>
              <input type="email" class="form-control input-border-bottom" name="Email" id="Email"
              placeholder="algo@algo.com"  value="{{isset($empresa->Email) ? $empresa->Email : '' }}" >
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-3">
              <label for="Site">Web Site:</label>
              <input type="text" class="form-control input-border-bottom" name="Site" id="Site"
              placeholder="www.algo.com"  value="{{isset($empresa->Site) ? $empresa->Site : '' }}" >
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
              <label for="IM">Incrição Municipal</label>
              <input type="text" class="form-control input-border-bottom" name="IM" id="IM"  minlength="7" maxlength="14" 
              value="{{isset($empresa->IM) ? $empresa->IM : '' }}" >
              <div class="invalid-feedback">
                Mínimo 7 caracteres!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="IE">incrição Estadual</label>
              <input type="text" class="form-control input-border-bottom" name="IE" id="IE"  minlength="9" maxlength="13"  
              value="{{isset($empresa->IE) ? $empresa->IE : '' }}" >
              <div class="invalid-feedback">
                Mínimo 9 caracteres!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="CNPJ">CNPJ</label>
              <input type="text" class="form-control input-border-bottom" name="CNPJ" id="CNPJ"  
              value="{{isset($empresa->CNPJ) ? $empresa->CNPJ : '' }}"  onblur="validarCNPJ(this)">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-3">
              <label for="Atividade">Ramo da Atividade:</label>
              <select class="form-control input-border-bottom" id="Atividade" name="Atividade">
                <option value="{{isset($empresa->Atividade) ? $empresa->Atividade : '' }} ">{{ $empresa->Atividade}}</option>
                <option value="0">Selecione</option>
                <option value="Açougue">Açougue</option>
                <option value="Agropecuária">Agropecuária</option>
                <option value="Artigos de Limpeza">Artigos de Limpeza </option>
                <option value="Auto Eletrica">Auto Eletrica</option>
                <option value="Auto Peças">Auto Peças</option>
                <option value="Calçados e art. esp.">Calçados e artigos esportivos</option>
                <option value="Comércio em Geral">Comércio em Geral </option>
                <option value="Construtora">Construtora </option>
                <option value="Cooperativa">Cooperativa</option>
                <option value="Cosmeticos">Cosmeticos</option>
                <option value="Dist. Gas">Dist. Gas </option>
                <option value="Dist. Bebidas">Distribuidora de bebidas </option>
                <option value="Dist. peças">Distribuidora de peças </option>
                <option value="Eletronica">Eletronica</option>
                <option value="Ervateira"> Ervateira </option>
                <option value="Extintores">Extintores</option>
                <option value="Gráfica">Gráfica</option>
                <option value=" Hotelaria">Hotelaria</option>
                <option value=" Informática">Informática</option>
                <option value="Lanchonete">Lanchonete</option>
                <option value="Loja de Móveis ">Loja de Móveis </option>
                <option value="Loja de Pneus ">Loja de Pneus </option>
                <option value="Loja de Roupas">Loja de Roupas</option>
                <option value="Madeireira ">Madeireira </option>
                <option value="Marcenaria ">Marcenaria </option>
                <option value="Marmorarias ">Marmorarias </option>
                <option value="Mat. de Construção ">Materiais de Construção </option>
                <option value="Mecanica Industrial ">Mecanica Industrial </option>
                <option value="Moto Peças "> Moto Peças </option>
                <option value="Oficinas Mecanicas"> Oficinas Mecanicas</option>
                <option value="Olaria">Olaria</option>
                <option value="Óticas">Óticas</option>
                <option value="Panificadora">Panificadora</option>
                <option value="Papelaria">Papelaria</option>
                <option value="Peças Agrícolas">Peças Agrícolas</option>
                <option value="Peixaria">Peixaria</option>
                <option value="Petshop">Petshop</option>
                <option value="Pizzaria">Pizzaria</option>
                <option value="Pré moldados">Pre moldados</option>
                <option value="Relojoaria">Relojoaria</option>
                <option value="Restaurante">Restaurante</option>
                <option value="Revenda de Veículos">Revenda de Veículos</option>
                <option value="Salão de Beleza">Salão de Beleza</option>
                <option value="Sorveteria">Sorveteria</option>
                <option value="Veterinaria">Veterinaria</option>
                <option value="Vidraçaria">Vidraçaria</option>
              </select>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-3">
              <label for="CNAE">Cod. Nac. de Ativ. da Empresa</label>
              <input type="text" class="form-control input-border-bottom" name="CNAE" id="CNAE"  maxlength="10"  
              value="{{isset($empresa->CNAE) ? $empresa->CNAE : '' }}" >
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
              <label for="CliFor_Saida">Cli/For Saída</label>
              <input type="text" class="form-control input-border-bottom" name="CliFor_Saida" id="CliFor_Saida"
              value="{{isset($empresa->CliFor_Saida) ? $empresa->CliFor_Saida : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="CliFor_Entrada">Cli/For Entrada</label>
              <input type="text" class="form-control input-border-bottom" name="CliFor_Entrada" id="CliFor_Entrada" 
              value="{{isset($empresa->CliFor_Entrada) ? $empresa->CliFor_Entrada : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="`Cfg_DataUltExec">Últ Exec do Sistema</label>
              <input type="date" class="form-control input-border-bottom" name="Cfg_DataUltExec" id="Cfg_DataUltExec"  
              value="{{isset($empresa->Cfg_DataUltExec) ? $empresa->Cfg_DataUltExec : '' }}" readonly>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>

            <div class="form-group col-lg-2">
              <label for="`Cfg_Ultbackup">Ultimo Backup:</label>
              <input type="date" class="form-control input-border-bottom" name="Cfg_Ultbackup" id="Cfg_Ultbackup"  
              value="{{isset($empresa->Cfg_Ultbackup) ? $empresa->Cfg_Ultbackup : '' }}" readonly>
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
              <label for="Cfg_DirRel">Diretorio dos registros</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_DirRel" id="Cfg_DirRel" minlength="5" maxlength="150" 
              value="{{isset($empresa->Cfg_DirRel) ? $empresa->Cfg_DirRel : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="Cfg_DirFotoProd">Diretorio das fotos dos Produtos:</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_DirFotoProd" id="Cfg_DirFotoProd" minlength="5" maxlength="150"
              value="{{isset($empresa->Cfg_DirFotoProd) ? $empresa->Cfg_DirFotoProd : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="Cfg_ImpOrcamento">Nome da Impressora(Orçamentos)</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpOrcamento" id="Cfg_ImpOrcamento" minlength="3" maxlength="20"
              value="{{isset($empresa->Cfg_ImpOrcamento) ? $empresa->Cfg_ImpOrcamento : '' }}">
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
              <label for="Cfg_ImpPedido">Nome da Impressora(Pedidos)</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpPedido" id="Cfg_ImpPedido" minlength="3" maxlength="20"
              value="{{isset($empresa->Cfg_ImpPedido) ? $empresa->Cfg_ImpPedido : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="Cfg_ImpOs">Nome da Impressora(OS)</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpOs" id="Cfg_ImpOs" minlength="3" maxlength="20"
              value="{{isset($empresa->Cfg_ImpOs) ? $empresa->Cfg_ImpOs : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="Cfg_ImpNfe">Nome da Impressora(NFEs)</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpNfe" id="Cfg_ImpNfe" minlength="3" maxlength="20"
              value="{{isset($empresa->Cfg_ImpNfe) ? $empresa->Cfg_ImpNfe : '' }}">
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
              <label for="Cfg_ImpEtiq">Nome da Impressora(Etiquetas)</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpEtiq" id="Cfg_ImpEtiq" minlength="3" maxlength="20"
              value="{{isset($empresa->Cfg_ImpEtiq) ? $empresa->Cfg_ImpEtiq : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="Cfg_ImpEtiqMod">Nome da Impressora(Etiquetas Modelo1)</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpEtiqMod" id="Cfg_ImpEtiqMod" minlength="3" maxlength="20"
              value="{{isset($empresa->Cfg_ImpEtiqMod) ? $empresa->Cfg_ImpEtiqMod : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="Cfg_TranSeq">Num Sequen. das Transacoes Fiscais Financeiras</label>
              <input type="text" class="form-control input-border-bottom" name="Cfg_TranSeq" id="Cfg_TranSeq"  maxlength="10"
              value="{{isset($empresa->Cfg_TranSeq) ? $empresa->Cfg_TranSeq : '' }}">
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
            <label for="SMTP_CorpoEmail">Corpo da Mensagem a ser enviada por email</label>
            <input type="text" class="form-control input-border-bottom" name="SMTP_CorpoEmail" id="SMTP_CorpoEmail" 
            value="{{isset($empresa->SMTP_CorpoEmail) ? $empresa->SMTP_CorpoEmail : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="SMTP_Serv">Endereço do servidor SMTP</label>
            <input type="text" class="form-control input-border-bottom" name="SMTP_Serv" id="SMTP_Serv"  maxlength="50"
            value="{{isset($empresa->SMTP_Serv) ? $empresa->SMTP_Serv : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-2">
            <label for="SMTP_Porta">Porta SMTP</label>
            <input type="text" class="form-control input-border-bottom" name="SMTP_Porta" id="SMTP_Porta" minlength="1" maxlength="5"
            value="{{isset($empresa->SMTP_Porta) ? $empresa->SMTP_Porta : '' }} ">
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
            <label for="SMTP_Usuario">Nome do usuario no servidor SMTP</label>
            <input type="text" class="form-control input-border-bottom" name="SMTP_Usuario" id="SMTP_Usuario"  minlength="5" maxlength="45"
            value="{{isset($empresa->SMTP_Usuario) ? $empresa->SMTP_Usuario : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="SMTP_Senha">Senha do usuário SMTP</label>
            <input type="password" class="form-control input-border-bottom" name="SMTP_Senha" id="SMTP_Senha"  minlength="5" maxlength="45"
            value="{{isset($empresa->SMTP_Senha) ? $empresa->SMTP_Senha : '' }} ">
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
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="SMTP_Seguro" name="SMTP_Seguro" value="1"  <?php if($empresa->SMTP_Seguro == '1'){ echo "checked"; } ?>>Utiliza Sistema de Seguranca SSL ou TLS?
                    </label>
                  </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="SMTP_EmailCopia" name="SMTP_EmailCopia" value="1"  <?php if($empresa->SMTP_EmailCopia == '1'){ echo "checked"; } ?>>Enviar cópia de email para e Empresa?
                    </label>
                  </div>
            </div>
            
        </div>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="SMTP_SSL">Tipo de Segurança SSL ou TLS</label>
            <select class="form-control input-border-bottom" id="SMTP_SSL" name="SMTP_SSL">
              <option value="{{isset($empresa->SMTP_SSL) ? $empresa->SMTP_SSL : '' }} ">{{ $empresa->SMTP_SSL}}</option> 
              <option value="TLS">TLS</option>
              <option value="SSL">SSL</option>
            </select>
          </div>
        </div>
        <br>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-3">
            <label for="WS_Plataforma">Plataforma WebService</label>
            <input type="text" class="form-control input-border-bottom" name="WS_Plataforma" id="WS_Plataforma"  maxlength="15"
            value="{{isset($empresa->WS_Plataforma) ? $empresa->WS_Plataforma : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="WB_Endereco">End. do Web Service Ecommerce</label>
            <input type="text" class="form-control input-border-bottom" name="WB_Endereco" id="WB_Endereco" maxlength="150"
            value="{{isset($empresa->WB_Endereco) ? $empresa->WB_Endereco : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          
          <div class="form-group col-lg-3">
            <label for="WS_WSDL">WSDL do WebService Ecommerce</label>
            <input type="text" class="form-control input-border-bottom" name="WS_WSDL" id="WS_WSDL"  maxlength="150"
            value="{{isset($empresa->WS_WSDL) ? $empresa->WS_WSDL : '' }} ">
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
            <label for="WS_Usuario">Usuário no WebService Ecommerce</label>
            <input type="text" class="form-control input-border-bottom" name="WS_Usuario" id="WS_Usuario"  minlength="4" maxlength="45"
            value="{{isset($empresa->WS_Usuario) ? $empresa->WS_Usuario : '' }} ">
            <div class="invalid-feedback">
              Mínimo 4 caracteres!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="WS_Senha">Senha no WebService Ecommerce</label>
            <input type="password" class="form-control input-border-bottom" name="WS_Senha" id="WS_Senha"  minlength="4" maxlength="45"
            value="{{isset($empresa->WS_Senha) ? $empresa->WS_Senha : '' }} ">
            <div class="invalid-feedback">
              Mínimo 4 caracteres!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="FTP_Endereco">Endereço FTP para subir arquivos</label>
            <input type="text" class="form-control input-border-bottom " name="FTP_Endereco" id="FTP_Endereco"  maxlength="150"
            value="{{isset($empresa->FTP_Endereco) ? $empresa->FTP_Endereco : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-2">
            <label for="FTP_Porta">Porta FTP:</label>
            <input type="text" class="form-control input-border-bottom" name="FTP_Porta" id="FTP_Porta"
            value="{{isset($empresa->FTP_Porta) ? $empresa->FTP_Porta : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="FTP_Usuario">Usuário FTP:</label>
            <input type="text" class="form-control input-border-bottom" name="FTP_Usuario" id="FTP_Usuario" maxlength="50"
            value="{{isset($empresa->FTP_Usuario) ? $empresa->FTP_Usuario : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="FTP_Senha">Senha FTP:</label>
            <input type="password" class="form-control input-border-bottom" name="FTP_Senha" id="FTP_Senha"  maxlength="88"
            value="{{isset($empresa->FTP_Senha) ? $empresa->FTP_Senha : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
        </div>
        <div class="form-row">
         
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="Fin_CFixos"> Percentual de Custos Fixos para Calculo Markup</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_CFixos" id="Fin_CFixos" 
            onblur="fin_CFixos()"maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_CFixos) ? $empresa->Fin_CFixos : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="Fin_Desloc">Preço Deslocamento para Calculo Markup</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_Desloc" id="Fin_Desloc" 
            onblur="fin_Desloc()" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_Desloc) ? $empresa->Fin_Desloc : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="Fin_Comissao">Percentual de Comissão para Cálculo Markup</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_Comissao"
            onblur="fin_Comissao()" id="Fin_Comissao" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_Comissao) ? $empresa->Fin_Comissao : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
        </div>
        <div class="form-row">
         
        </div>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="Fin_Inad">Percentual de Inadimplência para Cálculo Markup</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_Inad"
            onblur="fin_Inad()"  id="Fin_Inad" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_Inad) ? $empresa->Fin_Inad : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="Fin_Lucro"> Percentual Médio de Lucratividade para Calculo Markup</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_Lucro"
            onblur="fin_Lucro()" id="Fin_Lucro" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_Lucro) ? $empresa->Fin_Lucro : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="Fin_DescPV">Percentual de Desc. a Prazo para Chegar no Preço à Vista</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_DescPV"
            onblur="fin_DescPV()" id="Fin_DescPV" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_DescPV) ? $empresa->Fin_DescPV : '' }} ">
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
            <label for="Fin_PerDano">Percentual de Perdas e Danos para Cálculo Markup</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_PerDano"
            onblur="fin_PerDano()" id="Fin_PerDano" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_DescPV) ? $empresa->Fin_DescPV : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="Fin_JurosPadrao">Juros a ser cobrado no Contas a Receber do Sistema</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_JurosPadrao"
            onblur="fin_JurosPadrao()" id="Fin_JurosPadrao" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_JurosPadrao) ? $empresa->Fin_JurosPadrao : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="Fin_MsgPadrao">Mensagem padrão a ser impressa nos títulos!</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_MsgPadrao" id="Fin_MsgPadrao" maxlength="50"
            value="{{isset($empresa->Fin_MsgPadrao) ? $empresa->Fin_MsgPadrao : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Fin_ControlaCaixa" name="Fin_ControlaCaixa" value="1"  <?php if($empresa->Fin_ControlaCaixa == '1'){ echo "checked"; } ?>>Efetuar controle de caixa, exigindo abertura e fechamento diário?
                    </label>
                  </div>
            </div>
            </div>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="Fin_MultaPadrao">Multa padrão a ser aplicada no atraso de títulos</label>
            <input type="text" class="form-control input-border-bottom" name="Fin_MultaPadrao"
            onblur="fin_MultaPadrao()" id="Fin_MultaPadrao" maxlength="3" minlength="1"
            value="{{isset($empresa->Fin_MultaPadrao) ? $empresa->Fin_MultaPadrao : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
          <div class="form-group col-lg-4">
            <label for="Fin_ForImposto">Fornecedor</label>
            <select class="form-control input-border-bottom" id="Fin_ForImposto" name="Fin_ForImposto">
              @foreach($clifor as $clifor)
              @can('view_clifor', $clifor)
              <option value="{{$clifor->Codigo}}" {{ $empresa->Vend_CliForPadrao == $clifor->Codigo ? "selected" : "Selecione" }} >{{$clifor->Nome_Fantasia}}</option>
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
        <hr>
        <div class="form-row">
            <div class="form-group col-lg-7">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Fin_ComiFrac" name="Fin_ComiFrac" value="1"  <?php if($empresa->Fin_ComiFrac == '1'){ echo "checked"; } ?>>Utilizar pagamento de comissão fracionada aos vendedores?
                    </label>
                  </div>
            </div>
            <div class="form-group col-lg-5">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Fin_ContrComi" name="Fin_ContrComi" value="1"  <?php if($empresa->Fin_ContrComi == '1'){ echo "checked"; } ?>>Controlar Comissões?
                    </label>
                  </div>
            </div>
            
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-2">
            <label for="Fisc_Tributacao">Regime tributário</label>
            <select class="form-control input-border-bottom" id="Fisc_Tributacao" name="Fisc_Tributacao">
              <option value="{{isset($empresa->Fisc_Tributacao) ? $empresa->Fisc_Tributacao : '' }} ">{{ $empresa->Fisc_Tributacao}}</option>
              <option value="Simples Nacional">Simples Nacional</option>
              <option value="Lucro Real">Lucro Real</option>
              <option value="Lucro Presumido">Lucro Presumido</option>
            </select>
          </div>
          <div class="form-group col-lg-3">
            <label for="Fisc_ICMS">Percentual de ICMS do Estado</label>
            <input type="text" class="form-control input-border-bottom" name="Fisc_ICMS"
            onblur="fisc_ICMS()" id="Fisc_ICMS" maxlength="3" minlength="1"
            value="{{isset($empresa->Fisc_ICMS) ? $empresa->Fisc_ICMS : '' }}" >
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Fisc_PIS">Percentual de PIS da Atividade</label>
            <input type="text" class="form-control input-border-bottom" name="Fisc_PIS"
            onblur="fisc_PIS()" id="Fisc_PIS" maxlength="3" minlength="1"
            value="{{isset($empresa->Fisc_PIS) ? $empresa->Fisc_PIS : '' }}">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Fisc_COFINS">Percentual de COFINS da Atividade</label>
            <input type="text" class="form-control input-border-bottom" name="Fisc_COFINS"
            onblur="fisc_COFINS()" id="Fisc_COFINS" maxlength="3" minlength="1"
            value="{{isset($empresa->Fisc_COFINS) ? $empresa->Fisc_COFINS : '' }}">
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
            <label for="Fisc_ISSQN">Percentual de ISS da Atividade</label>
            <input type="text" class="form-control input-border-bottom" name="Fisc_ISSQN"
            onblur="fisc_ISSQN()" id="Fisc_ISSQN" maxlength="3" minlength="1"
            value="{{isset($empresa->Fisc_ISSQN) ? $empresa->Fisc_ISSQN : '' }}">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Fisc_IRPJ">Percentual de IRPJ da Atividade</label>
            <input type="text" class="form-control input-border-bottom" name="Fisc_IRPJ"
            onblur="fisc_IRPJ()" id="Fisc_IRPJ" maxlength="3" minlength="1"
            value="{{isset($empresa->Fisc_IRPJ) ? $empresa->Fisc_IRPJ : '' }}">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Fisc_CSLL">Percentual de CSLL da Atividade</label>
            <input type="text" class="form-control input-border-bottom" name="Fisc_CSLL" 
            onblur="fisc_CSLL()" id="Fisc_CSLL" maxlength="3" minlength="1"
            value="{{isset($empresa->Fisc_CSLL) ? $empresa->Fisc_CSLL : '' }}">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-2">
            <label for="Fisc_Simples">Tabela do Simples</label>
            <input type="text" class="form-control input-border-bottom" name="Fisc_Simples" id="Fisc_Simples" maxlength="3" minlength="1"
            value="{{isset($empresa->Fisc_Simples) ? $empresa->Fisc_Simples : '' }}">
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
            <label for="Fisc_CFOP">Padrão de vendas</label>
            <select class="form-control input-border-bottom" id="Fisc_CFOP" name="Fisc_CFOP">
              <option value="{{isset($empresa->Fisc_CFOP) ? $empresa->Fisc_CFOP : '' }} ">{{ $empresa->Fisc_CFOP}}</option>
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
          <div class="form-group col-lg-7">
              <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Fisc_ICMSFixo" name="Fisc_ICMSFixo" value="1"  <?php if($empresa->Fisc_ICMSFixo == '1'){ echo "checked"; } ?>>Utilizar ICMS Fixo, descontando o percentual nas Notas de empresa Simples?
                    </label>
              </div>
          </div>
        </div>
        <br>
        <div class="form-row">
          <div class="form-group col-lg-3">
            <label for="NFe_CertDig">Numero do certificado A1 ou A3</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_CertDig" id="NFe_CertDig" maxlength="45"
            value="{{isset($empresa->NFe_CertDig) ? $empresa->NFe_CertDig : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="NFe_WebServ">Estado onde o WS esta implantado</label>
            <select class="form-control input-border-bottom" id="NFe_WebServ" name="NFe_WebServ">
              <option value="{{isset($empresa->NFe_WebServ) ? $empresa->NFe_WebServ : '' }} ">{{ $empresa->NFe_WebServ}}</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="PI">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
          <div class="form-group col-lg-3">
            <label for="NFe_Ambiente">Ambiente de Trabalho</label>
            <select class="form-control input-border-bottom"  id="NFe_Ambiente" name="NFe_Ambiente">
              <option value="{{isset($empresa->NFe_Ambiente) ? $empresa->NFe_Ambiente : '' }} ">{{ $empresa->NFe_Ambiente}}</option>
              <option value="2">Produção</option>
              <option value="1">Homologação</option>
            </select>
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-8">
            <label for="NFe_Proxy">Proxy a ser utilizado</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_Proxy" id="NFe_Proxy" maxlength="150"
            value="{{isset($empresa->NFe_Proxy) ? $empresa->NFe_Proxy : '' }} ">
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
            <label for="NFe_Porta">Porta do Proxy</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_Porta" id="NFe_Porta" maxlength="5"
            value="{{isset($empresa->NFe_Porta) ? $empresa->NFe_Porta : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="NFe_Usuario">Usuário do Proxy a ser utilizado</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_Usuario" id="NFe_Usuario" minlength="4" maxlength="50"
            value="{{isset($empresa->NFe_Usuario) ? $empresa->NFe_Usuario : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="NFe_Senha">Senha do Proxy a ser utilizado </label>
            <input type="password" class="form-control input-border-bottom" name="NFe_Senha" id="NFe_Senha" minlength="4" maxlength="50"
            value="{{isset($empresa->NFe_Senha) ? $empresa->NFe_Senha : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-5">
            <label for="NFe_DirXML">Diretorio dos Schemas e onde serão salvos os XML das NFes</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_DirXML" id="NFe_DirXML" maxlength="150"
            value="{{isset($empresa->NFe_DirXML) ? $empresa->NFe_DirXML : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="NFe_FormaEmiss">Forma de Emissao da NFe</label>
            <select class="form-control input-border-bottom" id="NFe_FormaEmiss" name="NFe_FormaEmiss">
              <option value="{{isset($empresa->NFe_FormaEmiss) ? $empresa->NFe_FormaEmiss : '' }} ">{{ $empresa->NFe_FormaEmiss}}</option>
              <option value="Normal">Normal</option>
              <option value="Conting">Contingência</option>
            </select>
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-2">
            <label for="NFe_Serie">Serie da Nota </label>
            <select class="form-control input-border-bottom" id="NFe_Serie" name="NFe_Serie">
              <option value="{{isset($empresa->NFe_Serie) ? $empresa->NFe_Serie : '' }} ">{{ $empresa->NFe_Serie}}</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-lg-3">
            <label for="NFe_Modelo">Modelo da Nota Eletrônica</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_Modelo" id="NFe_Modelo" maxlength="3"
            value="{{isset($empresa->NFe_Modelo) ? $empresa->NFe_Modelo : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="NFe_Versao">Versão dos Schemas para emissão da Nota</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_Versao" id="NFe_Versao" maxlength="4"
            value="{{isset($empresa->NFe_Versao) ? $empresa->NFe_Versao : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="NFe_Orient">Orientaçao de Impressao da nota </label>
            <select class="form-control input-border-bottom" id="NFe_Orient" name="NFe_Orient">
              <option value="{{isset($empresa->NFe_Orient) ? $empresa->NFe_Orient : '' }} ">{{ $empresa->NFe_Orient}}</option>
              <option value="R">Retrato</option>
              <option value="P">Paisagem</option>
            </select>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-lg-4">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="NFe_Valida" name="NFe_Valida" value="1" <?php if($empresa->NFe_Valida == '1'){ echo "checked"; } ?>>Validar Notas de Entrada?
                    </label>
                  </div>
            </div>
          <div class="form-group col-lg-6">
            <label for="NFe_Obs">Observação a ser impressa no rodapé da NFe</label>
            <input type="text" class="form-control input-border-bottom" name="NFe_Obs" id="NFe_Obs"
            value="{{isset($empresa->NFe_Obs) ? $empresa->NFe_Obs : '' }} ">
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
            <label for="NFCe_Ambiente">Ambiente de trabalho NFCe </label>
            <select class="form-control input-border-bottom" id="NFCe_Ambiente" name="NFCe_Ambiente">
              <option value="{{isset($empresa->NFCe_Ambiente) ? $empresa->NFCe_Ambiente : '' }} ">{{ $empresa->NFCe_Ambiente}}</option>
              <option value="2">Produção</option>
              <option value="1">Homologação</option> 
            </select>
          </div>
          <div class="form-group col-lg-2">
            <label for="NFCe_Serie">Serie da NFCe</label>
            <select class="form-control input-border-bottom" id="NFCe_Serie" name="NFCe_Serie">
              <option value="{{isset($empresa->NFCe_Serie) ? $empresa->NFCe_Serie : '' }} ">{{ $empresa->NFCe_Serie}}</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
          <div class="form-group col-lg-2">
            <label for="NFCe_Modelo">Modelo da NFCe</label>
            <input type="text" class="form-control input-border-bottom" name="NFCe_Modelo" id="NFCe_Modelo" maxlength="3"
            value="{{isset($empresa->NFCe_Modelo) ? $empresa->NFCe_Modelo : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <label for="NFCe_Versao">Versão dos Schemas da NFCe</label>
            <input type="text" class="form-control input-border-bottom" name="NFCe_Versao" id="NFCe_Versao" maxlength="4"
            value="{{isset($empresa->NFCe_Versao) ? $empresa->NFCe_Versao : '' }} ">
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
            <label for="NFCe_idToken">Código de Identificação do Token</label>
            <input type="text" class="form-control input-border-bottom" name="NFCe_idToken" id="NFCe_idToken" maxlength="11"
            value="{{isset($empresa->NFCe_idToken) ? $empresa->NFCe_idToken : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="NFCe_CSC">Numero CSC a ser gerado</label>
            <input type="text" class="form-control input-border-bottom" name="NFCe_CSC" id="NFCe_CSC" maxlength="45"
            value="{{isset($empresa->NFCe_CSC) ? $empresa->NFCe_CSC : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-3">
            <label for="Ctb_Email">Email do contador(envio XML)</label>
            <input type="email" class="form-control input-border-bottom" name="Ctb_Email" id="Ctb_Email" maxlength="150"
            value="{{isset($empresa->Ctb_Email) ? $empresa->Ctb_Email : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Ctb_ContNome">Nome do Contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContNome" id="Ctb_ContNome" maxlength="60" min="3"
            value="{{isset($empresa->Ctb_ContNome) ? $empresa->Ctb_ContNome : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Ctb_ContCRC">CRC do contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContCRC" id="Ctb_ContCRC" maxlength="25"
            value="{{isset($empresa->Ctb_ContCRC) ? $empresa->Ctb_ContCRC : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Ctb_ContINSS">ISS do Contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContINSS" id="Ctb_ContINSS" maxlength="25"
            value="{{isset($empresa->Ctb_ContINSS) ? $empresa->Ctb_ContINSS : '' }} ">
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
            <label for="Ctb_contCPF">CPF do Contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_contCPF" id="Ctb_contCPF" maxlength="14"
            value="{{isset($empresa->Ctb_contCPF) ? $empresa->Ctb_contCPF : '' }} " onblur="validarCPF(this)">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Ctb_ContFone">Telefone do Contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContFone" id="Ctb_ContFone"
            value="{{isset($empresa->Ctb_ContFone) ? $empresa->Ctb_ContFone : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Ctb_RegLocal">Local de Registro do Contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_RegLocal" id="Ctb_RegLocal" maxlength="100"
            value="{{isset($empresa->Ctb_RegLocal) ? $empresa->Ctb_RegLocal : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-3">
            <label for="Ctb_RegNumero">Número de Registro do Contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_RegNumero" id="Ctb_RegNumero" maxlength="50"
            value="{{isset($empresa->Ctb_RegNumero) ? $empresa->Ctb_RegNumero : '' }} ">
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
            <label for="Ctb_RegData">Data de Registro do Contador</label>
            <input type="text" class="form-control input-border-bottom" name="Ctb_RegData" id="Ctb_RegData"
            value="{{isset($empresa->Ctb_RegData) ? $empresa->Ctb_RegData : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
            <script type="text/javascript">
            $(function () {
                $('#Ctb_RegData').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        </script>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-lg-3">
            <label for="Vend_CliForPadrao">Vendedor Padrão </label>
            <select class="form-control input-border-bottom" id="Vend_CliForPadrao" name="Vend_CliForPadrao">
            @foreach($user as $u)
              @if(auth()->user()->id == $u->adm)
              <option value="{{$u->id}}" {{ $empresa->Vend_CliForPadrao == $u->id ? "selected" : "" }} >{{ $u->name}}</option>
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
            <label for="Vend_CondPadrao">Condição de venda Padrão</label>
            <select class="form-control input-border-bottom" id="Vend_CondPadrao" name="Vend_CondPadrao">
              @foreach($cond_pag as $cond_pag)
              <option value="{{$cond_pag->Codigo}}" {{ $empresa->Vend_CondPadrao == $cond_pag->Codigo ? "selected" : "" }} >{{ $cond_pag->Condicao}}</option>
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
            <label for="Vend_FormPadrao">Forma de Pagamento padrão</label>
            <select class="form-control input-border-bottom" id="Vend_FormPadrao" name="Vend_FormPadrao">
              @foreach($form_pag as $form_pag)
              <option value="{{$form_pag->Codigo}}" {{ $empresa->Vend_FormPadrao == $form_pag->Codigo ? "selected" : "" }} >{{ $form_pag->Descricao }}</option>
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
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-12">
            <label for="Vend_DescAdicOrca">Descrição Adicional impressa no rodapé dos Orçamentos</label>
            <input type="text" class="form-control input-border-bottom" name="Vend_DescAdicOrca" id="Vend_DescAdicOrca" maxlength="150"
            value="{{isset($empresa->Vend_DescAdicOrca) ? $empresa->Vend_DescAdicOrca : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
          </div>
          <div class="form-row">
          <div class="form-group col-lg-12">
            <label for="Vend_DescAdicPed">Descricao Adicional impressa no rodapé dos Pedidos</label>
            <input type="text" class="form-control input-border-bottom" name="Vend_DescAdicPed" id="Vend_DescAdicPed" maxlength="150"
            value="{{isset($empresa->Vend_DescAdicPed) ? $empresa->Vend_DescAdicPed : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
          </div>
          <div class="form-row">
          <div class="form-group col-lg-12">
            <label for="Vend_DescAdicOS">Descricao Adicional impressa no rodapé da OS</label>
            <input type="text" class="form-control input-border-bottom" name="Vend_DescAdicOS" id="Vend_DescAdicOS" maxlength="150"
            value="{{isset($empresa->Vend_DescAdicOS) ? $empresa->Vend_DescAdicOS : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
        </div>
         <div class="form-row">
        <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_BxEstOSOrc" name="Vend_BxEstOSOrc" value="1" <?php if($empresa->Vend_BxEstOSOrc == '1'){ echo "checked"; } ?>> Baixar Estoque em OS com Situacao EM ORCAMENTO?
                    </label>
                  </div>
            </div>
            
        <div class="form-group col-lg-4 ml-2">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_PedSimp" name="Vend_PedSimp" value="1" <?php if($empresa->Vend_PedSimp == '1'){ echo "checked"; } ?>>Tela simplificada para emissao de pedidos?
                    </label>
                </div>
          </div>
      </div>
         <div class="form-row">
            <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_PreviewRel" name="Cfg_PreviewRel" value="1" <?php if($empresa->Cfg_PreviewRel == '1'){ echo "checked"; } ?>> Pré Vizualizar Relatórios Emitidos?
                    </label>
                  </div>
              </div>

              <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_LembCliAniv" name="Cfg_LembCliAniv" value="1" <?php if($empresa->Cfg_LembCliAniv == '1'){ echo "checked"; } ?>> Lembrar Aniversario de Clientes?
                    </label>
                  </div>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_PesqCep" name="Cfg_PesqCep" value="1" <?php if($empresa->Cfg_PesqCep == '1'){ echo "checked"; } ?>> Pesquisa automatica de CEP?
                    </label>
                  </div>
              </div>

              <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_IdentChamada" name="Cfg_IdentChamada" value="1" <?php if($empresa->Cfg_IdentChamada == '1'){ echo "checked"; } ?>> Utilizar identificador de chamadas?
                    </label>
                  </div>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_AtuPrecoPrazo" name="Cfg_AtuPrecoPrazo" value="1" <?php if($empresa->Cfg_AtuPrecoPrazo == '1'){ echo "checked"; } ?>>Atualização dos preços a prazo?
                    </label>
                  </div>
              </div>

              <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_PermDuplicar" name="Cfg_PermDuplicar" value="1" <?php if($empresa->Cfg_PermDuplicar == '1'){ echo "checked"; } ?>> Permite duplicar cadastro do cliente?
                    </label>
                  </div>
              </div>
          </div>
        <div class="form-row">
      <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_AltPrTot" name="Vend_AltPrTot" value="1" <?php if($empresa->Vend_AltPrTot == '1'){ echo "checked"; } ?>>Altera Preco Total nos Orcamentos, Pedidos e OSs?
                    </label>
                  </div>
            </div>

            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_ExibeEst" name="Vend_ExibeEst" value="1" <?php if($empresa->Vend_ExibeEst == '1'){ echo "checked"; } ?>>Exibir a quantidade de Estoque na tela de Pedido, OS?
                    </label>
                  </div>
            </div>
      </div>
      <div class="form-row">
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_FreteIncorp" name="Vend_FreteIncorp" value="1" <?php if($empresa->Vend_FreteIncorp == '1'){ echo "checked"; } ?>>Valor do Frete incorpora o Total do Pedido, OS?
                    </label>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_AgrupaltPed" name="Vend_AgrupaltPed" value="1" <?php if($empresa->Vend_AgrupaltPed == '1'){ echo "checked"; } ?>>Agrupar itens lancados duplicados no Pedido?
                    </label>
                  </div>
            </div>
      </div>
      <div class="form-row">
      <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_MudaStatOS" name="Vend_MudaStatOS" value="1"<?php if($empresa->Vend_MudaStatOS == '1'){ echo "checked"; } ?>>Mudar Status de Ordem de Servico ao Faturar?
                    </label>
                  </div>
            </div>

            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_BuscObs" name="Vend_BuscObs" value="1"<?php if($empresa->Vend_BuscObs == '1'){ echo "checked"; } ?>>Utiliza observacoes de produtos nas buscas?
                    </label>
                  </div>
            </div>
      </div>
      <div class="form-row">
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_ProgFide" name="Vend_ProgFide" value="1"<?php if($empresa->Vend_ProgFide == '1'){ echo "checked"; } ?>>Utilizar programa de fidelidade?
                    </label>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_FiltroIniMes" name="Vend_FiltroIniMes" value="1"<?php if($empresa->Vend_FiltroIniMes == '1'){ echo "checked"; } ?>>Filtro do Sistema pelo Inicio do Mes?
                    </label>
                  </div>
            </div>
      </div>
         <hr>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="Vend_DiasLocacao">Dias padrão para Lançamento de Locações </label>
            <input type="text" class="form-control input-border-bottom" name="Vend_DiasLocacao" id="Vend_DiasLocacao" maxlength="5"
            value="{{isset($empresa->Vend_DiasLocacao) ? $empresa->Vend_DiasLocacao : '' }} ">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <label for="Vend_ProgPtos">Valor base para computação de pontos no prog de fidelidade </label>
            <input type="text" class="form-control input-border-bottom" name="Vend_ProgPtos" 
            onblur="valor_base()"id="Vend_ProgPtos" maxlength="10"
            value="{{isset($empresa->Vend_ProgPtos) ? $empresa->Vend_ProgPtos : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="Vend_TranspPadrao">Transportadora padrão</label>
            <select class="form-control input-border-bottom" id="Vend_TranspPadrao" name="Vend_TranspPadrao">
              @foreach($transportadora as $transportadora)
              @can("view_transp",$transportadora)
              <option value="{{$transportadora->Codigo}}" {{ $empresa->Vend_TranspPadrao == $transportadora->Codigo ? "selected" : "Selecione" }} >{{$transportadora->Razao_Social}}</option>
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
          <div class="form-group col-lg-4">
            <label for="Vend_VlrHora">Valor da hora de trabalho </label>
            <input type="text" class="form-control input-border-bottom" name="Vend_VlrHora" 
            onblur="val_hora()"id="Vend_VlrHora" maxlength="10"
            value="{{isset($empresa->Vend_VlrHora) ? $empresa->Vend_VlrHora : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
          <div class="form-group col-lg-4">
            <label for="Vend_VlrMinimo">Valor mínimo de hora de trabalho </label>
            <input type="text" class="form-control input-border-bottom" name="Vend_VlrMinimo" 
            onblur="min_hora()"id="Vend_VlrMinimo" maxlength="10"
            value="{{isset($empresa->Vend_VlrMinimo) ? $empresa->Vend_VlrMinimo : '' }} ">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
        </div>
        <div class="form-row">
          {{ csrf_field() }}
          <button id="btn2" class="btn btn-success">Salvar</button>
          <a href="{{ url("/Cadastro/empresas") }}" class="btn btn-danger ml-3"> Cancelar</a>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">
        $('input').on("keypress", function(e) {
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
    
    for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
      Resto = (Soma * 10) % 11;
    
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
    
    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
      Resto = (Soma * 10) % 11;
    
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
  }
  alert(TestaCPF(strCPF));
  
  function validarCNPJ(el){
    if( !_cnpj(el.value) ){
      
      alert("CNPJ inválido! - " + el.value);
      
      // apaga o valor
      el.value = "";
    }else{
     
    }
  }
  
  function validarCPF(el){
    if( !TestaCPF(el.value) ){
      
      alert("cpf inválido! - " + el.value);
      
      // apaga o valor
      el.value = "";
    }else{
     
    }
  }
  function val_hora() {
        var desc = parseFloat(document.getElementById('Vend_VlrHora').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Vend_VlrHora').value = lim;
    }

    function min_hora() {
        var desc = parseFloat(document.getElementById('Vend_VlrMinimo').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Vend_VlrMinimo').value = lim;
    }
  function valor_base() {
        var desc = parseFloat(document.getElementById('Vend_ProgPtos').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Vend_ProgPtos').value = lim;
    }
    function fisc_CSLL() {
        var desc = parseFloat(document.getElementById('Fisc_CSLL').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fisc_CSLL').value = lim;
    }
939807
    function fisc_IRPJ() {
        var desc = parseFloat(document.getElementById('Fisc_IRPJ').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fisc_IRPJ').value = lim;
    }
    function fisc_ISSQN() {
        var desc = parseFloat(document.getElementById('Fisc_ISSQN').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fisc_ISSQN').value = lim;
    }
    function fisc_COFINS() {
        var desc = parseFloat(document.getElementById('Fisc_COFINS').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fisc_COFINS').value = lim;
    }
    function fisc_PIS() {
        var desc = parseFloat(document.getElementById('Fisc_PIS').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fisc_PIS').value = lim;
    }
    function fisc_ICMS() {
        var desc = parseFloat(document.getElementById('Fisc_ICMS').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fisc_ICMS').value = lim;
    }
    function fin_MultaPadrao() {
        var desc = parseFloat(document.getElementById('Fin_MultaPadrao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_MultaPadrao').value = lim;
    }
    function fin_JurosPadrao() {
        var desc = parseFloat(document.getElementById('Fin_JurosPadrao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_JurosPadrao').value = lim;
    }
    function fin_PerDano() {
        var desc = parseFloat(document.getElementById('Fin_PerDano').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_PerDano').value = lim;
    }
    function fin_DescPV() {
        var desc = parseFloat(document.getElementById('Fin_DescPV').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_DescPV').value = lim;
    }
    function fin_Lucro() {
        var desc = parseFloat(document.getElementById('Fin_Lucro').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_Lucro').value = lim;
    }
    function fin_Inad() {
        var desc = parseFloat(document.getElementById('Fin_Inad').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_Inad').value = lim;
    }
    function fin_Comissao() {
        var desc = parseFloat(document.getElementById('Fin_Comissao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_Comissao').value = lim;
    }
    function fin_Desloc() {
        var desc = parseFloat(document.getElementById('Fin_Desloc').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_Desloc').value = lim;
    }
    function fin_CFixos() {
        var desc = parseFloat(document.getElementById('Fin_CFixos').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fin_CFixos').value = lim;
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
			$(document).ready(() => {
				$('#btn1').on('click', () => {
					$('#btn2').trigger('click')
				})
			})
		</script>
