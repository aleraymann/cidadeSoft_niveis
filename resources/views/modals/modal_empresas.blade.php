
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">


      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cadastro de Empresas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        @if(!isset($id))
        <form method="post" class="needs-validation" novalidate action="{{url("/Empresa/salvar")}}" enctype="multipart/form-data"
        onsubmit="return checkForm(this);">
         @else
         <form method="post" action="{{url("/Empresa/salvar/$id")}}" enctype="multipart/form-data">
          @endif

          <div class="form-row">
            <div class="form-group col-lg-12" hidden>
              <b class="ls-label-text" for="RG">User_ID:</b>
              <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
              readonly value="{{ Auth::user()->id }}" >
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-lg-12">
              <b class="ls-label-text" for="Logo">Logomarca:</b>
              <input type="file" class="form-control" name="Logo" id="Logo">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-12">
              <b class="ls-label-text" for="RG">Nome Fantasia:</b>
              <input type="text" class="form-control input-border-bottom" name="Nome_Fantasia" id="Nome_Fantasia"
              placeholder="Nome Fantasia ou Apelido" required minlength="4" maxlength="60">
              <div class="invalid-feedback">
                Campo Obrigatório, Mínimo 4 caracteres!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-12">
              <b class="ls-label-text" for="Razao_Social">Razão Social:</b>
              <input type="text" class="form-control input-border-bottom" name="Razao_Social" id="Razao_Social"
              placeholder="Razão Social" required  minlength="4" maxlength="60">
              <div class="invalid-feedback">
                Campo Obrigatório, Mínimo 4 caracteres!!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-3">
              <b class="ls-label-text" for="CEP">CEP:</b>
              <input type="text" class="form-control input-border-bottom" name="CEP" id="CEP" placeholder="000000000">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-7">
              <b class="ls-label-text" for="Endereco">Endereço:</b>
              <input type="text" class="form-control input-border-bottom" name="Endereco" id="Endereco"
              placeholder="Rua, Travessa, Avenida">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <b class="ls-label-text" for="Cod_IBGE">Código IBGE:</b>
              <input type="number" class="form-control input-border-bottom" name="Cod_IBGE" id="Cod_IBGE"
              placeholder="">
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
              <b class="ls-label-text" for="Numero">Número:</b>
              <input type="number" class="form-control input-border-bottom" name="Numero" id="Numero">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>

            <div class="form-group col-lg-3">
              <b class="ls-label-text" for="Bairro">Bairro:</b>
              <input type="text" class="form-control input-border-bottom" name="Bairro" id="Bairro">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>

            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="Cidade">Cidade:</b>
              <input type="text" class="form-control input-border-bottom" name="Cidade" id="Cidade">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-3">
              <b class="ls-label-text" for="Estado">Estado:</b>
              <input type="text" class="form-control input-border-bottom" name="Estado" id="Estado" minlength="2" maxlength="2" placeholder="Sigla">
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
              <b class="ls-label-text" for="Telefone">Telefone Principal:</b>
              <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            
            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="Celular">Celular de Plantão:</b>
              <input type="text" class="form-control input-border-bottom" name="Celular" id="Celular">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            
            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="FAX">FAX:</b>
              <input type="text" class="form-control input-border-bottom" name="FAX" id="FAX">
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
              <b class="ls-label-text" for="Email">Email:</b>
              <input type="email" class="form-control input-border-bottom" name="Email" id="Email"
              placeholder="algo@algo.com">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-6">
              <b class="ls-label-text" for="Site">Web Site:</b>
              <input type="text" class="form-control input-border-bottom" name="Site" id="Site"
              placeholder="www.algo.com">
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
              <b class="ls-label-text" for="IM">Insrição Municipal:</b>
              <input type="text" class="form-control input-border-bottom" name="IM" id="IM"  minlength="7" maxlength="14" >
              <div class="invalid-feedback">
                Mínimo 7 caracteres!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="IE">Inscrição Estadual:</b>
              <input type="text" class="form-control input-border-bottom" name="IE" id="IE"  minlength="9" maxlength="13" >
              <div class="invalid-feedback">
                Mínimo 9 caracteres!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="CNPJ">CNPJ:</b>
              <input type="text" class="form-control input-border-bottom" name="CNPJ" id="CNPJ" onblur="validarCNPJ(this)">
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
              <b class="ls-label-text" for="Atividade">Ramo da Atividade:</b>
              <select class="form-control input-border-bottom" id="Atividade" name="Atividade">
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
          </div>
          <div class="form-row">
            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="CNAE">Cod. Nac. de Ativ. da Empresa:</b>
              <input type="text" class="form-control input-border-bottom" name="CNAE" id="CNAE"  maxlength="10">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="CliFor_Saida">Cliente/Fornecedor Saída:</b>
              <input type="text" class="form-control input-border-bottom" name="CliFor_Saida" id="CliFor_Saida">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="CliFor_Entrada">Cliente/Fornecedor Entrada:</b>
              <input type="text" class="form-control input-border-bottom" name="CliFor_Entrada" id="CliFor_Entrada" >
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
              <b class="ls-label-text" for="Cfg_DataUltExec">Última Execução do Sistema:</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_DataUltExec" id="Cfg_DataUltExec"  value="{{ date('d/m/Y') }}"  required readonly>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>

            <div class="form-group col-lg-4">
              <b class="ls-label-text" for="Cfg_Ultbackup">Último Backup:</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_Ultbackup" id="Cfg_Ultbackup"  value="{{ date('d/m/Y') }}"  required readonly>
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
            <div class="form-group col-lg-6">
              <b class="ls-label-text" for="Cfg_DirRel">Diretório dos registros:</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_DirRel" id="Cfg_DirRel" minlength="5" maxlength="150">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-6">
              <b class="ls-label-text" for="Cfg_DirFotoProd">Diretório das Fotos dos Produtos:</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_DirFotoProd" id="Cfg_DirFotoProd" minlength="5" maxlength="150">
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
              <b class="ls-label-text" for="Cfg_ImpOrcamento">Nome da Impressora(Orçamentos):</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpOrcamento" id="Cfg_ImpOrcamento" minlength="3" maxlength="20">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-6">
              <b class="ls-label-text" for="Cfg_ImpPedido">Nome da Impressora(Pedidos):</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpPedido" id="Cfg_ImpPedido" minlength="3" maxlength="20">
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
              <b class="ls-label-text" for="Cfg_ImpOs">Nome da Impressora(OS):</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpOs" id="Cfg_ImpOs" minlength="3" maxlength="20">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-6">
              <b class="ls-label-text" for="Cfg_ImpNfe">Nome da Impressora(NFEs):</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpNfe" id="Cfg_ImpNfe" minlength="3" maxlength="20">
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
              <b class="ls-label-text" for="Cfg_ImpEtiq">Nome da Impressora(Etiquetas):</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpEtiq" id="Cfg_ImpEtiq" minlength="3" maxlength="20">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-6">
              <b class="ls-label-text" for="Cfg_ImpEtiqMod">Nome da Impressora(Etiquetas Modelo1):</b>
              <input type="text" class="form-control input-border-bottom" name="Cfg_ImpEtiqMod" id="Cfg_ImpEtiqMod" minlength="3" maxlength="20">
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
              <b class="ls-label-text" for="Cfg_TranSeq">Num Sequen. das Transacoes Fiscais Financeiras:</b>
              <input type="number" class="form-control input-border-bottom" name="Cfg_TranSeq" id="Cfg_TranSeq"  maxlength="10">
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
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="SMTP_CorpoEmail">Corpo da Mensagem a ser enviada por email:</b>
            <input type="text" class="form-control input-border-bottom" name="SMTP_CorpoEmail" id="SMTP_CorpoEmail" >
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="SMTP_Serv">Endereço do servidor SMTP:</b>
            <input type="text" class="form-control input-border-bottom" name="SMTP_Serv" id="SMTP_Serv"  maxlength="50">
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
            <b class="ls-label-text" for="SMTP_Porta">Porta SMTP:</b>
            <input type="text" class="form-control input-border-bottom" name="SMTP_Porta" id="SMTP_Porta" minlength="1" maxlength="5">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="SMTP_Usuario">Nome do Usuário no Servidor SMTP:</b>
            <input type="text" class="form-control input-border-bottom" name="SMTP_Usuario" id="SMTP_Usuario"  minlength="5" maxlength="45">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="SMTP_Senha">Senha do Usuário SMTP:</b>
            <input type="password" class="form-control input-border-bottom" name="SMTP_Senha" id="SMTP_Senha"  minlength="5" maxlength="45">
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
                      <input type="checkbox" class="form-check-input" id="SMTP_Seguro" name="SMTP_Seguro" value="1">Utiliza Sistema de Seguranca SSL ou TLS?
                    </label>
                  </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="SMTP_EmailCopia" name="SMTP_EmailCopia" value="1">Enviar cópia de email para e Empresa?
                    </label>
                  </div>
            </div>
            
        </div>
        <div class="form-row">
        <div class="form-group col-lg-4">
              <b class="ls-label-text" for="SMTP_SSL">Tipo de Segurança SSL ou TLS:</b>
              <select class="form-control input-border-bottom" id="SMTP_SSL" name="SMTP_SSL">
                <option value="TLS">TLS</option>
                <option value="SSL">SSL</option>
              </select>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="WS_Plataforma">Plataforma WebService:</b>
            <input type="text" class="form-control input-border-bottom" name="WS_Plataforma" id="WS_Plataforma"  maxlength="15">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="WB_Endereco">End. do Web Service Ecommerce:</b>
            <input type="text" class="form-control input-border-bottom" name="WB_Endereco" id="WB_Endereco" maxlength="150">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="WS_WSDL">WSDL do WebService Ecommerce:</b>
            <input type="text" class="form-control input-border-bottom" name="WS_WSDL" id="WS_WSDL"  maxlength="150">
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
            <b class="ls-label-text" for="WS_Usuario">Usuário no WebService Ecommerce:</b>
            <input type="text" class="form-control input-border-bottom" name="WS_Usuario" id="WS_Usuario"  minlength="4" maxlength="45">
            <div class="invalid-feedback">
              Mínimo 4 caracteres!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="WS_Senha">Senha no WebService Ecommerce:</b>
            <input type="password" class="form-control input-border-bottom" name="WS_Senha" id="WS_Senha"  minlength="4" maxlength="45">
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
          <div class="form-group col-lg-8">
            <b class="ls-label-text" for="FTP_Endereco">Endereço FTP para subir arquivos:</b>
            <input type="text" class="form-control input-border-bottom" name="FTP_Endereco" id="FTP_Endereco"  maxlength="150">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="FTP_Porta">Porta FTP para subir arquivos:</b>
            <input type="text" class="form-control input-border-bottom" name="FTP_Porta" id="FTP_Porta">
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
            <b class="ls-label-text" for="FTP_Usuario">Usuário FTP para subir arquivos:</b>
            <input type="text" class="form-control input-border-bottom" name="FTP_Usuario" id="FTP_Usuario" maxlength="50">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="FTP_Senha">Senha FTP para subir arquivos:</b>
            <input type="password" class="form-control input-border-bottom"  name="FTP_Senha" id="FTP_Senha"  maxlength="88">
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
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Fin_CFixos">Percentual de Custos Fixos para Cálculo Markup:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_CFixos" 
            onblur="fin_CFixos()" id="Fin_CFixos" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Fin_Desloc">Preço Deslocamento para Cálculo Markup:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_Desloc"
            onblur="fin_Desloc()" id="Fin_Desloc"  maxlength="3" minlength="1" value="0.00">
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
            <b class="ls-label-text" for="Fin_Comissao">Percentual de Comissão para Cálculo Markup:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_Comissao"
            onblur="fin_Comissao()" id="Fin_Comissao" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Fin_Inad">Percentual de Inadimplência para Cálculo Markup:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_Inad"
            onblur="fin_Inad()" id="Fin_Inad" maxlength="3" minlength="1" value="0.00">
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
            <b class="ls-label-text" for="Fin_Lucro">Percentual Médio de Lucratividade para Calculo Markup:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_Lucro" id="Fin_Lucro"
            onblur="fin_Lucro()" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Fin_DescPV">Percentual de Desconto no Preço à Prazo para Chegar no Preço à Vista:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_DescPV" 
            onblur="fin_DescPV()" id="Fin_DescPV" maxlength="3" minlength="1" value="0.00">
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
            <b class="ls-label-text" for="Fin_PerDano">Percentual de Perdas e Danos para Cálculo Markup:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_PerDano"
            onblur="fin_PerDano()" id="Fin_PerDano" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Fin_JurosPadrao">Juros a ser cobrado no Contas a Receber do Sistema:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_JurosPadrao"
            onblur="fin_JurosPadrao()" id="Fin_JurosPadrao" maxlength="3" minlength="1" value="0.00">
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
            <b class="ls-label-text" for="Fin_MsgPadrao">Mensagem padrão a ser impressa nos títulos:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_MsgPadrao" id="Fin_MsgPadrao" maxlength="50">
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
                      <input type="checkbox" class="form-check-input" id="Fin_ControlaCaixa" name="Fin_ControlaCaixa" value="1">Efetuar controle de caixa, exigindo abertura e fechamento diário?
                    </label>
                  </div>
            </div>
            </div>
        <div class="form-row">
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Fin_MultaPadrao">Multa padrão a ser aplicada no atraso de títulos:</b>
            <input type="text" class="form-control input-border-bottom" name="Fin_MultaPadrao"
            onblur="fin_MultaPadrao()" id="Fin_MultaPadrao" maxlength="3" minlength="1" value="0.00">
          </div>
          <div class="invalid-feedback">
            Por favor, Campo Obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Fin_ForImposto">Fornecedor:</b>
            <select class="form-control input-border-bottom" id="Fin_ForImposto" name="Fin_ForImposto">
              <option value="0">Selecione</option>
              @foreach ($clifor as $clifor)
              @can("view_clifor",$clifor)
              <option value="{{$clifor->Codigo}}">{{ $clifor->Nome_Fantasia }}</option>
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
                      <input type="checkbox" class="form-check-input" id="Fin_ComiFrac" name="Fin_ComiFrac" value="1">Utilizar pagamento de comissão fracionada aos vendedores?
                    </label>
                  </div>
            </div>
            <div class="form-group col-lg-5">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Fin_ContrComi" name="Fin_ContrComi" value="1">Controlar Comissões?
                    </label>
                  </div>
            </div>
            
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Fisc_Tributacao">Regime Tributário:</b>
            <select class="form-control input-border-bottom" id="Fisc_Tributacao" name="Fisc_Tributacao">
              <option value="Simples Nacional">Simples Nacional</option>
              <option value="Lucro Real">Lucro Real</option>
              <option value="Lucro Presumido">Lucro Presumido</option>
            </select>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Fisc_ICMS">Percentual de ICMS do Estado:</b>
            <input type="text" class="form-control input-border-bottom" name="Fisc_ICMS"
            onblur="fisc_ICMS()" id="Fisc_ICMS" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Fisc_PIS">Percentual de PIS da Atividade:</b>
            <input type="text" class="form-control input-border-bottom" name="Fisc_PIS"
            onblur="fisc_PIS()" id="Fisc_PIS" maxlength="3" minlength="1" value="0.00">
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
            <b class="ls-label-text" for="Fisc_COFINS">Percentual de COFINS da Atividade:</b>
            <input type="text" class="form-control input-border-bottom" name="Fisc_COFINS"
            onblur="fisc_COFINS()" id="Fisc_COFINS" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Fisc_ISSQN">Percentual de ISS da Atividade:</b>
            <input type="text" class="form-control input-border-bottom" name="Fisc_ISSQN"
            onblur="fisc_ISSQN()" id="Fisc_ISSQN" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Fisc_IRPJ">Percentual de IRPJ da Atividade:</b>
            <input type="text" class="form-control input-border-bottom" name="Fisc_IRPJ"
            onblur="fisc_IRPJ()"  id="Fisc_IRPJ" maxlength="3" minlength="1" value="0.00">
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
            <b class="ls-label-text" for="Fisc_CSLL">Percentual de CSLL da Atividade:</b>
            <input type="text" class="form-control input-border-bottom" name="Fisc_CSLL"
            onblur="fisc_CSLL()" id="Fisc_CSLL" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Fisc_Simples">Tabela do Simples:</b>
            <input type="text" class="form-control input-border-bottom" name="Fisc_Simples" id="Fisc_Simples" maxlength="3" minlength="1" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Fisc_CFOP">Padrão de Vendas:</b>
            <select class="form-control input-border-bottom" id="Fisc_CFOP">
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
        <div class="form-group col-lg-7">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Fisc_ICMSFixo" name="Fisc_ICMSFixo" value="1">Utilizar ICMS Fixo, descontando o percentual nas Notas de empresa Simples?
                    </label>
                  </div>
            </div>

        </div>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFe_CertDig">Número do certificado A1 ou A3:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_CertDig" id="NFe_CertDig" maxlength="45">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFe_WebServ">Estado onde o WS está implantado:</b>
            <select class="form-control input-border-bottom" id="NFe_WebServ" name="NFe_WebServ">
              <option value="0">Selecione</option>
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
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFe_Ambiente">Ambiente de Trabalho:</b>
            <select class="form-control input-border-bottom" id="NFe_Ambiente" name="NFe_Ambiente">
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
            <b class="ls-label-text" for="NFe_Proxy">Proxy a ser utilizado:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_Proxy" id="NFe_Proxy" maxlength="150">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFe_Porta">Porta do Proxy:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_Porta" id="NFe_Porta" maxlength="5">
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
            <b class="ls-label-text" for="NFe_Usuario">Usuário do Proxy a ser utilizado:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_Usuario" id="NFe_Usuario" minlength="4" maxlength="50">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="NFe_Senha">Senha do Proxy a ser utilizado:</b>
            <input type="password" class="form-control input-border-bottom" name="NFe_Senha" id="NFe_Senha" minlength="4" maxlength="50">
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
            <b class="ls-label-text" for="NFe_DirXML">Diretório dos Schemas e onde serão salvos os XML das NFes:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_DirXML" id="NFe_DirXML" maxlength="150">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFe_FormaEmiss">Forma de Emissão da NFe:</b>
            <select class="form-control input-border-bottom" id="NFe_FormaEmiss" name="NFe_FormaEmiss">
              <option value="0" >Selecione</option>
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
        </div>
        <div class="form-row">
          <div class="form-group col-lg-2">
            <b class="ls-label-text" for="NFe_Serie">Série da Nota:</b>
            <select class="form-control input-border-bottom" id="NFe_Serie" name="NFe_Serie">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
          <div class="form-group col-lg-5">
            <b class="ls-label-text" for="NFe_Modelo">Modelo da Nota Eletrônica:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_Modelo" id="NFe_Modelo" maxlength="3">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-5">
            <b class="ls-label-text" for="NFe_Versao">Versão dos Schemas para emissão da Nota:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_Versao" id="NFe_Versao" maxlength="4">
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
            <b class="ls-label-text" for="NFe_Orient">Orientação de Impressao da Nota:</b>
            <select class="form-control input-border-bottom" id="NFe_Orient" name="NFe_Orient">
              <option value="R">Retrato</option>
              <option value="P">Paisagem</option>
            </select>
          </div>
          <div class="form-group col-lg-4 ml-2">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="NFe_Valida" name="NFe_Valida" value="1">Validar Notas de Entrada?
                    </label>
                  </div>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-lg-12">
            <b class="ls-label-text" for="NFe_Obs">Observação a ser impressa no rodapé da NFe:</b>
            <input type="text" class="form-control input-border-bottom" name="NFe_Obs" id="NFe_Obs">
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
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFCe_Ambiente">Ambiente de trabalho NFCe:</b>
            <select class="form-control input-border-bottom" id="NFCe_Ambiente" name="NFCe_Ambiente">
              <option value="2">Produção</option>
              <option value="1">Homologação</option> 
            </select>
          </div>
          <div class="form-group col-lg-2">
            <b class="ls-label-text" for="NFCe_Serie">Série da NFCe:</b>
            <select class="form-control input-border-bottom" id="NFCe_Serie" name="NFCe_Serie">
              <option  value="0">Selecione</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="NFCe_Modelo">Modelo da NFCe:</b>
            <input type="text" class="form-control input-border-bottom" name="NFCe_Modelo" id="NFCe_Modelo" maxlength="3">
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
            <b class="ls-label-text" for="NFCe_Versao">Versão dos Schemas da NFCe:</b>
            <input type="text" class="form-control input-border-bottom" name="NFCe_Versao" id="NFCe_Versao" maxlength="4" value="3.10">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFCe_idToken">Código de Identificação do Token:</b>
            <input type="text" class="form-control input-border-bottom" name="NFCe_idToken" id="NFCe_idToken" maxlength="11">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="NFCe_CSC">Número CSC a ser gerado:</b>
            <input type="text" class="form-control input-border-bottom" name="NFCe_CSC" id="NFCe_CSC" maxlength="45">
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
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Ctb_Email">Email do Contador(envio XML):</b>
            <input type="email" class="form-control input-border-bottom" name="Ctb_Email" id="Ctb_Email" maxlength="150">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Ctb_ContNome">Nome do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContNome" id="Ctb_ContNome" maxlength="60" min="3">
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
            <b class="ls-label-text" for="Ctb_ContCRC">CRC do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContCRC" id="Ctb_ContCRC" maxlength="25">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Ctb_ContINSS">ISS do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContINSS" id="Ctb_ContINSS" maxlength="25">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Ctb_contCPF">CPF do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_contCPF" id="Ctb_contCPF" maxlength="14" onblur="validarCPF(this)">
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
            <b class="ls-label-text" for="Ctb_ContFone">Telefone do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_ContFone" id="Ctb_ContFone">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Ctb_RegLocal">Local de Registro do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_RegLocal" id="Ctb_RegLocal" maxlength="100">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Ctb_RegNumero">Número de Registro do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_RegNumero" id="Ctb_RegNumero" maxlength="50">
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
            <b class="ls-label-text" for="Ctb_RegData">Data de Registro do Contador:</b>
            <input type="text" class="form-control input-border-bottom" name="Ctb_RegData" id="Ctb_RegData" placeholder="DD/MM/AAAA">
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
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Vend_CliForPadrao">Vendedor Padrão:</b>
            <select class="form-control input-border-bottom" id="Vend_CliForPadrao" name="Vend_CliForPadrao" required>
              <option value="0">Selecione</option>
              @foreach($user as $u)
              @if(auth()->user()->id == $u->adm)
              <option value="{{$u->id}}">{{ $u->name }}</option>
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
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Condicao">Condição de venda Padrão:</b>
            <select class="form-control input-border-bottom" id="Condicao" name="Condicao">
              <option  value="0">Selecione</option>
              @foreach($cond_pag as $cond_pag)
              @can("view_condPag",$cond_pag)
              <option value="{{$cond_pag->Codigo}}">{{ $cond_pag->Condicao }}</option>
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
            <b class="ls-label-text" for="Vend_FormPadrao">Forma de Pagamento Padrão:</b>
            <select class="form-control input-border-bottom" id="Vend_FormPadrao" name="Vend_FormPadrao">
              <option value="0">Selecione</option>
              @foreach($form_pag as $form_pag)
              @can("view_formPag",$form_pag)
              <option value="{{$form_pag->Codigo}}">{{ $form_pag->Descricao }}</option>
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
          <div class="form-group col-lg-12">
            <b class="ls-label-text" for="Vend_DescAdicOrca">Descrição adicional a ser impressa no rodapé dos Orçamentos:</b>
            <input type="text" class="form-control input-border-bottom" name="Vend_DescAdicOrca" id="Vend_DescAdicOrca" maxlength="150">
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
            <b class="ls-label-text" for="Vend_DescAdicPed">Descrição adicional a ser impressa no rodapé dos Pedidos:</b>
            <input type="text" class="form-control input-border-bottom" name="Vend_DescAdicPed" id="Vend_DescAdicPed" maxlength="150">
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
            <b class="ls-label-text" for="Vend_DescAdicOS">Descrição adicional a ser impressa no rodapé da OS:</b>
            <input type="text" class="form-control input-border-bottom" name="Vend_DescAdicOS" id="Vend_DescAdicOS" maxlength="150">
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
                      <input type="checkbox" class="form-check-input" id="Cfg_PreviewRel" name="Cfg_PreviewRel" value="1"> Pré Vizualizar Relatórios Emitidos?
                    </label>
                  </div>
              </div>

              <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_LembCliAniv" name="Cfg_LembCliAniv" value="1"> Lembrar Aniversario de Clientes?
                    </label>
                  </div>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_PesqCep" name="Cfg_PesqCep" value="1"> Pesquisa automatica de CEP?
                    </label>
                  </div>
              </div>

              <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_IdentChamada" name="Cfg_IdentChamada" value="1"> Utilizar identificador de chamadas?
                    </label>
                  </div>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_AtuPrecoPrazo" name="Cfg_AtuPrecoPrazo" value="1">Atualização dos preços a prazo?
                    </label>
                  </div>
              </div>

              <div class="form-group col-lg-6">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Cfg_PermDuplicar" name="Cfg_PermDuplicar" value="1"> Permite duplicar cadastro do cliente?
                    </label>
                  </div>
              </div>
          </div>
      <div class="form-row">
      <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_AltPrTot" name="Vend_AltPrTot" value="1">Altera Preco Total nos Orcamentos, Pedidos e OSs?
                    </label>
                  </div>
            </div>

            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_ExibeEst" name="Vend_ExibeEst" value="1">Exibir a quantidade de Estoque na tela de Pedido, OS?
                    </label>
                  </div>
            </div>
      </div>
      <div class="form-row">
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_FreteIncorp" name="Vend_FreteIncorp" value="1">Valor do Frete incorpora o Total do Pedido, OS?
                    </label>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_AgrupaltPed" name="Vend_AgrupaltPed" value="1">Agrupar itens lancados duplicados no Pedido?
                    </label>
                  </div>
            </div>
      </div>
      <div class="form-row">
      <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_MudaStatOS" name="Vend_MudaStatOS" value="1">Mudar Status de Ordem de Servico ao Faturar?
                    </label>
                  </div>
            </div>

            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_BuscObs" name="Vend_BuscObs" value="1">Utiliza observacoes de produtos nas buscas?
                    </label>
                  </div>
            </div>
      </div>
      <div class="form-row">
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_ProgFide" name="Vend_ProgFide" value="1">Utilizar programa de fidelidade?
                    </label>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_FiltroIniMes" name="Vend_FiltroIniMes" value="1">Filtro do Sistema pelo Inicio do Mes?
                    </label>
                  </div>
            </div>
      </div>
      <div class="form-row">
        <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_BxEstOSOrc" name="Vend_BxEstOSOrc" value="1"> Baixar Estoque em OS com Situacao EM ORCAMENTO?
                    </label>
                  </div>
            </div>
            <div class="form-group col-lg-4">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Vend_PedSimp" name="Vend_PedSimp" value="1">Tela simplificada para emissao de pedidos?
                    </label>
                  </div>
            </div>
        
      </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Vend_DiasLocacao">Dias padrão para Lançamento de Locações:</b>
            <input type="text" class="form-control input-border-bottom" name="Vend_DiasLocacao" id="Vend_DiasLocacao" maxlength="5" value="0">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          <div class="form-group col-lg-6">
            <b class="ls-label-text" for="Vend_ProgPtos">Valor base de pontos no prog de fidelidade:</b>
            <input type="text" class="form-control input-border-bottom" name="Vend_ProgPtos"
            onblur="val_base()" id="Vend_ProgPtos" maxlength="10" value="0.00">
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
            <b class="ls-label-text" for="Vend_TranspPadrao">Transportadora padrão:</b>
            <select class="form-control input-border-bottom" id="Vend_TranspPadrao" name="Vend_TranspPadrao">
              <option value="0">Selecione</option>
              @foreach($transportadora as $transportadora)
              @can("view_transp",$transportadora)
              <option value="{{$transportadora->Codigo}}">{{ $transportadora->Nome_Fantasia }}</option>
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
            <b class="ls-label-text" for="Vend_VlrHora">Valor da hora de trabalho:</b>
            <input type="text" class="form-control input-border-bottom" name="Vend_VlrHora" 
            onblur="val_hora()" id="Vend_VlrHora" maxlength="10" value="0.00">
            <div class="invalid-feedback">
              Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
              Tudo certo!
            </div>
          </div>
          
          <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Vend_VlrMinimo">Valor mínimo de hora de trabalho:</b>
            <input type="text" class="form-control input-border-bottom" name="Vend_VlrMinimo"
            onblur="min_hora()" id="Vend_VlrMinimo" maxlength="10" value="0.00">
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
          <input  class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos'/>
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
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
      </div>
    </div>
  </div>
</div>

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
  function val_base() {
        var desc = parseFloat(document.getElementById('Vend_ProgPtos').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Vend_ProgPtos').value = lim;
    }
    function fisc_CSLL() {
        var desc = parseFloat(document.getElementById('Fisc_CSLL').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Fisc_CSLL').value = lim;
    }

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
