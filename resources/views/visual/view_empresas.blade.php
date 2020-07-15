@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/empresas") }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $empresa->Razao_Social }}
                </h4>
                @can("view_empresa",$empresa)
                    <div class="btn-group" role="group">
                        <a href='{{ url("/Empresa/editar/$empresa->Codigo") }}' class="btn btn-success btn-xs" style="border-radius:2px;">
                            <i class='far fa-edit'></i>
                        </a>
                    </div>
                @endcan
            </div>
            @if($empresa->Logo != null)
              <img src="{{ url("storage/empresas/{$empresa->Logo}") }}"    style="max-width:150px; height:150px" >
			@else
				<img src="{{url("img/empresa_padrao.jpg")}}"  style="max-width:150px; height:150px">
			@endif
            <div class="card-body">

                <div class="table-responsive">

                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados da Empresa</th>
                                <th>Dados do Adicionais</th>
                                <th>Impressoras e Diretórios</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b class="ls-label-text">Razão Social:</b>
                                    <label>{{ $empresa->Razao_Social }} </label><br>
                                    <b class="ls-label-text">Nome Fantasia:</b>
                                    <label>{{ $empresa->Nome_Fantasia }} </label><br>
                                    <b class="ls-label-text">Endereço:</b>
                                    <label>{{ $empresa->Endereco }} </label><br>
                                    <b class="ls-label-text">Número:</b>
                                    <label>{{ $empresa->Numero }} </label><br>
                                    <b class="ls-label-text">Bairro:</b>
                                    <label>{{ $empresa->Bairro }} </label><br>
                                    <b class="ls-label-text">Cidade:</b>
                                    <label>{{ $empresa->Cidade }} </label><br>
                                    <b class="ls-label-text">Estado:</b>
                                    <label>{{ $empresa->Estado }} </label><br>
                                    <b class="ls-label-text">Código IBGE:</b>
                                    <label>{{ $empresa->Cod_IBGE }} </label><br>
                                    <b class="ls-label-text">CEP:</b>
                                    <label>{{ $empresa->CEP }} </label><br>
                                    <b class="ls-label-text">Email:</b>
                                    <label>{{ $empresa->Email }} </label><br>
                                    <b class="ls-label-text">Site:</b>
                                    <label>{{ $empresa->Site }} </label><br>
                                    <b class="ls-label-text">Inscrição Municipal:</b>
                                    <label>{{ $empresa->IM }} </label><br>
                                    <b class="ls-label-text">Incriçao Estadual:</b>
                                    <label>{{ $empresa->IE }} </label><br>
                                    <b class="ls-label-text">CNPJ:</b>
                                    <label>{{ $empresa->CNPJ }} </label><br>
                                    <b class="ls-label-text">Ramo da Atividade:</b>
                                    <label>{{ $empresa->Atividade }} </label><br>
                                    <b class="ls-label-text">CNAE:</b>
                                    <label>{{ $empresa->CNAE }} </label><br>
                                    <b class="ls-label-text">Telefone Principal:</b>
                                    <label>{{ $empresa->Telefone }} </label><br>
                                    <b class="ls-label-text">Celular de Plantão:</b>
                                    <label>{{ $empresa->Celular }} </label><br>
                                    <b class="ls-label-text">Fax:</b>
                                    <label>{{ $empresa->FAX }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Lembrar aniversariantes?</b>
                                    <label>{{ $empresa->Cfg_LembCliAniv==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Pesquisa Automatica de CEP?</b>
                                    <label>{{ $empresa->Cfg_PesqCep==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">utiliza Identificador de Chamada?</b>
                                    <label>{{ $empresa->Cfg_IdentChamada==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Atualização do Preço à Prazo?</b>
                                    <label>{{ $empresa->Cfg_AtuPrecoPrazo==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Duplicar cadastro de cliente?</b>
                                    <label>{{ $empresa->Cfg_PermDuplicar==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Cliente/Fornecedor Entrada:</b>
                                    <label>{{ $empresa->CliFor_Entrada }} </label><br>
                                    <b class="ls-label-text">Cliente/Fornecedor Saída:</b>
                                    <label>{{ $empresa->CliFor_Saida }} </label><br>
                                    <b class="ls-label-text">Última execução do Sistema:</b>
                                    <label>{{ $empresa->Cfg_DataUltExec }} </label><br>
                                    <b class="ls-label-text">Último Backup:</b>
                                    <label>{{ $empresa->Cfg_Ultbackup }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Diretório dos Registros:</b>
                                    <label>{{ $empresa->Cfg_DirRel }} </label><br>
                                    <b class="ls-label-text">Pré Vizualizar Relatórios:</b>
                                    <label>{{ $empresa->Cfg_PreviewRel==1?"Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Diretório das Fotos dos Produtos:</b>
                                    <label>{{ $empresa->Cfg_DirFotoProd }} </label><br>
                                    <b class="ls-label-text">Impressora Orçamentos:</b>
                                    <label>{{ $empresa->Cfg_ImpOrcamento }} </label><br>
                                    <b class="ls-label-text">Impressora OS:</b>
                                    <label>{{ $empresa->Cfg_ImpOs }} </label><br>
                                    <b class="ls-label-text">Impressora NFes:</b>
                                    <label>{{ $empresa->Cfg_ImpNfe }} </label><br>
                                    <b class="ls-label-text">Impressora Etiquetas:</b>
                                    <label>{{ $empresa->Cfg_ImpEtiq }} </label><br>
                                    <b class="ls-label-text">Impressora Etiquetas Modelo1:</b>
                                    <label>{{ $empresa->Cfg_ImpEtiqMod }} </label><br>
                                    <b class="ls-label-text">Numero Sequencial das Transacoes Fiscais Financeiras:</b>
                                    <label>{{ $empresa->Cfg_TranSeq }} </label><br>

                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>




            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>SMTP / WebService / FTP</th>
                                <th>Dados Financeiros</th>
                                <th>Dados Fiscais</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b class="ls-label-text">Corpo da mensagem a ser enviada por email</b>
                                    <label>{{ $empresa->SMTP_CorpoEmail }} </label><br>
                                    <b class="ls-label-text">Endereço do Servidor SMTP</b>
                                    <label>{{ $empresa->SMTP_Serv }} </label><br>
                                    <b class="ls-label-text">Porta do Servidor SMTP</b>
                                    <label>{{ $empresa->SMTP_Porta }} </label><br>
                                    <b class="ls-label-text">Nome do Usuário no Servidor SMTP</b>
                                    <label>{{ $empresa->SMTP_Usuario }} </label><br>
                                    <b class="ls-label-text">Utiliza Sistema de Seguranca SSL ou TLS?</b>
                                    <label>{{ $empresa->SMTP_Seguro==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Tipo de Seguranca SSL ou TLS</b>
                                    <label>{{ $empresa->SMTP_SSL }} </label><br>
                                    <b class="ls-label-text">Enviar copia de email para Empresa</b>
                                    <label>{{ $empresa->SMTP_EmailCopia==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Plataforma do WebService Ecommerce</b>
                                    <label>{{ $empresa->WS_Plataforma }} </label><br>
                                    <b class="ls-label-text">Endereço do WebService Ecommerce</b>
                                    <label>{{ $empresa->WB_Endereco }} </label><br>
                                    <b class="ls-label-text">Endereço do WebService Ecommerce</b>
                                    <label>{{ $empresa->WB_Endereco }} </label><br>
                                    <b class="ls-label-text">WSDL do WebService Ecommerce</b>
                                    <label>{{ $empresa->WS_WSDL }} </label><br>
                                    <b class="ls-label-text">Usuário no WebService Ecommerce</b>
                                    <label>{{ $empresa->WS_Usuario }} </label><br>
                                    <b class="ls-label-text">Endereco do FTP para subir arquivos</b>
                                    <label>{{ $empresa->FTP_Endereco }} </label><br>
                                    <b class="ls-label-text">Porta do FTP para subir arquivos</b>
                                    <label>{{ $empresa->FTP_Porta }} </label><br>
                                    <b class="ls-label-text">Nome Usuario do FTP para subir arquivos</b>
                                    <label>{{ $empresa->FTP_Usuario }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Percentual de Custos Fixos para Cálculo Markup:</b>
                                    <label>{{ $empresa->Fin_CFixos }} </label><br>
                                    <b class="ls-label-text">Preço Deslocamento para Cálculo Markup:</b>
                                    <label>{{ $empresa->Fin_Desloc }} </label><br>
                                    <b class="ls-label-text">Percentual de Comissão para Cálculo Markup:</b>
                                    <label>{{ $empresa->Fin_Comissao }} </label><br>
                                    <b class="ls-label-text">Percentual de Inadimplência para Cálculo Markup:</b>
                                    <label>{{ $empresa->Fin_Inad }} </label><br>
                                    <b class="ls-label-text">Percentual Médio de Lucratividade para Calculo Markup:</b>
                                    <label>{{ $empresa->Fin_Lucro }} </label><br>
                                    <b class="ls-label-text">Percentual de Desconto no Preço à Prazo para Chegar no
                                        Preço à Vista:</b>
                                    <label>{{ $empresa->Fin_DescPV }} </label><br>
                                    <b class="ls-label-text">Percentual de Perdas e Danos para Calculo Markup:</b>
                                    <label>{{ $empresa->Fin_PerDano }} </label><br>
                                    <b class="ls-label-text">Juros Padrao a ser cobrado no Contas a Receber do
                                        Sistema:</b>
                                    <label>{{ $empresa->Fin_MsgPadrao }} </label><br>
                                    <b class="ls-label-text">Mensagem padrao a ser impressa nos titulos:</b>
                                    <label>{{ $empresa->Fin_MsgPadrao }} </label><br>
                                    <b class="ls-label-text">Efetuar controle de caixa, exigindo abertura e fechamento
                                        diario:</b>
                                    <label>{{ $empresa->Fin_ControlaCaixa==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Multa padrao a ser aplicada no atraso de titulos:</b>
                                    <label>{{ $empresa->Fin_MultaPadrao }} </label><br>
                                    <b class="ls-label-text">Fornecedor:</b>
                                    <label>{{ $empresa->Fin_ForImposto }} </label><br>
                                    <b class="ls-label-text">Utilizar pagamento de comissao fracionada aos
                                        vendedores:</b>
                                    <label>{{ $empresa->Fin_ComiFrac==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text"> Controlar Comissoes:</b>
                                    <label>{{ $empresa->Fin_ContrComi==1? "Sim":"Não" }}
                                    </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Regime Tributario da Empresa:</b>
                                    <label>{{ $empresa->Fisc_Tributacao }} </label><br>
                                    <b class="ls-label-text">Percentual de ICMS padrao aplicado no Estado:</b>
                                    <label>{{ $empresa->Fisc_ICMS }} </label><br>
                                    <b class="ls-label-text">Percentual de PIS aplicado no Ramo de Atividade:</b>
                                    <label>{{ $empresa->Fisc_PIS }} </label><br>
                                    <b class="ls-label-text">Percentual de COFINS aplicado no Ramo de Atividade:</b>
                                    <label>{{ $empresa->Fisc_COFINS }} </label><br>
                                    <b class="ls-label-text">Percentual de ISS aplicado ao Ramo de Atividade:</b>
                                    <label>{{ $empresa->Fisc_ISSQN }} </label><br>
                                    <b class="ls-label-text">Percentual de IRPJ aplicado no Ramo de Atividade:</b>
                                    <label>{{ $empresa->Fisc_IRPJ }} </label><br>
                                    <b class="ls-label-text">Percentual de CSLL aplicado no Ramo de Atividade:</b>
                                    <label>{{ $empresa->Fisc_CSLL }} </label><br>
                                    <b class="ls-label-text">Tabela do Simples em que a empresa se enquadra:</b>
                                    <label>{{ $empresa->Fisc_Simples }} </label><br>
                                    <b class="ls-label-text">Padrao a ser utilizado nas vendas:</b>
                                    <label>{{ $empresa->Fisc_CFOP }} </label><br>
                                    <b class="ls-label-text">Utilizar ICMS Fixo, descontando o percentual nas Notas de
                                        empresa Simples:</b>
                                    <label>{{ $empresa->Fisc_ICMSFixo==1? "Sim":"Não" }}
                                    </label><br>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>NFe / NFCe</th>
                                <th>Dados do Contador</th>
                                <th>Dados de Vendas</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b class="ls-label-text">Codigo serial do certificado digital A1 ou A3:</b>
                                    <label>{{ $empresa->NFe_CertDig }} </label><br>
                                    <b class="ls-label-text">Estado em que o WebService esta implantado:</b>
                                    <label>{{ $empresa->NFe_WebServ }} </label><br>
                                    <b class="ls-label-text">Ambiente de trabalho NFe:</b>
                                    <label>{{ $empresa->NFe_Ambiente }} </label><br>
                                    <b class="ls-label-text"> Proxy a ser utilizado para conexao com internet:</b>
                                    <label>{{ $empresa->NFe_Proxy }} </label><br>
                                    <b class="ls-label-text">Porta do Proxy a ser utilizado para conexao com
                                        internet:</b>
                                    <label>{{ $empresa->NFe_Porta }} </label><br>
                                    <b class="ls-label-text">Usuario do Proxy a ser utilizado para conexao com
                                        internet:</b>
                                    <label>{{ $empresa->NFe_Usuario }} </label><br>
                                    <b class="ls-label-text">Diretorio onde se encontram os Schemas e serao salvos os
                                        XML das NFes:</b>
                                    <label>{{ $empresa->NFe_DirXML }} </label><br>
                                    <b class="ls-label-text">Forma de Emissao da NFe:</b>
                                    <label>{{ $empresa->NFe_FormaEmiss=="Normal"? "Normal":"Contingência" }}
                                    </label><br>
                                    <b class="ls-label-text">Serie da Nota Eletronica :</b>
                                    <label>{{ $empresa->NFe_Serie }} </label><br>
                                    <b class="ls-label-text">Modelo da Nota Eletronica:</b>
                                    <label>{{ $empresa->NFe_Modelo }} </label><br>
                                    <b class="ls-label-text">Versao dos Schemas Utilizados para emissao da Nota:</b>
                                    <label>{{ $empresa->NFe_Versao }} </label><br>
                                    <b class="ls-label-text">Orientacao de impressao da Nota Eletronica:</b>
                                    <label>{{ $empresa->NFe_Orient=="R"? "Retrato":"Paisagem" }}
                                    </label><br>
                                    <b class="ls-label-text">Validar Notas de Entrada?</b>
                                    <label>{{ $empresa->NFe_Valida==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Observação a ser impressa no rodapé da NFe:</b>
                                    <label>{{ $empresa->NFe_Obs }} </label><br>
                                    <b class="ls-label-text">Ambiente de trabalho NFCe :</b>
                                    <label>{{ $empresa->NFe_Valida==1? "Homologação":"Produção" }}
                                    </label><br>
                                    <b class="ls-label-text">Serie da Nota Eletronica do Consumidor:</b>
                                    <label>{{ $empresa->NFCe_Serie }} </label><br>
                                    <b class="ls-label-text">Modelo da Nota Eletronica do Consumidor:</b>
                                    <label>{{ $empresa->NFCe_Modelo }} </label><br>
                                    <b class="ls-label-text">Versão dos Schemas Utilizados para emissão da Nota do
                                        Consumidor:</b>
                                    <label>{{ $empresa->NFCe_Versao }} </label><br>
                                    <b class="ls-label-text">Código de identificação do Token:</b>
                                    <label>{{ $empresa->NFCe_idToken }} </label><br>
                                    <b class="ls-label-text">Numero CSC a ser gerado pela Receita:</b>
                                    <label>{{ $empresa->NFCe_CSC }} </label><br>
                                    <b class="ls-label-text">Percentual de CSLL aplicado no Ramo de Atividade:</b>
                                    <label>{{ $empresa->Fisc_CSLL }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Nome do Contador:</b>
                                    <label>{{ $empresa->Ctb_ContNome }} </label><br>
                                    <b class="ls-label-text">Email do Contador para envio dos XMLs:</b>
                                    <label>{{ $empresa->Ctb_Email }} </label><br>
                                    <b class="ls-label-text">CRC do Contador:</b>
                                    <label>{{ $empresa->Ctb_ContCRC }} </label><br>
                                    <b class="ls-label-text">INSS do Contador:</b>
                                    <label>{{ $empresa->Ctb_ContINSS }} </label><br>
                                    <b class="ls-label-text">CPF do Contador:</b>
                                    <label>{{ $empresa->Ctb_contCPF }} </label><br>
                                    <b class="ls-label-text">Telefone de contato do Contador:</b>
                                    <label>{{ $empresa->Ctb_ContFone }} </label><br>
                                    <b class="ls-label-text">Local de Registro do Contador:</b>
                                    <label>{{ $empresa->Ctb_RegLocal }} </label><br>
                                    <b class="ls-label-text">Número do Registro do Contador:</b>
                                    <label>{{ $empresa->Ctb_RegNumero }} </label><br>
                                    <b class="ls-label-text">Data de Registro do Contador:</b>
                                    <label>{{ $empresa->Ctb_RegData }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Tela simplificada para emissao de pedidos:</b>
                                    <label>{{ $empresa->Vend_PedSimp==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Vendedor Padrão:</b>
                                    <label>{{ $empresa->Vend_CliForPadrao }} </label><br>
                                    <b class="ls-label-text">Cod. Condição de venda Padrão:</b>
                                    <label>{{ $empresa->Vend_CondPadrao }} </label><br>
                                    <b class="ls-label-text">Cod. Forma de pagamento Padrão:</b>
                                    <label>{{ $empresa->Vend_FormPadrao }} </label><br>
                                    <b class="ls-label-text">Descrição Adicional a ser impressa no rodapé dos
                                        Orçamentos:</b>
                                    <label>{{ $empresa->Vend_DescAdicOrca }} </label><br>
                                    <b class="ls-label-text">Descrição Adicional a ser impressa no rodapé dos
                                        Pedidos:</b>
                                    <label>{{ $empresa->Vend_DescAdicPed }} </label><br>
                                    <b class="ls-label-text">Descrição Adicional a ser impressa no rodapé das OS:</b>
                                    <label>{{ $empresa->Vend_DescAdicOS }} </label><br>
                                    <b class="ls-label-text">Altera Preco Total nos Orcamentos, Pedidos e OSs:</b>
                                    <label>{{ $empresa->Vend_AltPrTot==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Exibir a quantidade de Estoque na tela de Pedido, OS:</b>
                                    <label>{{ $empresa->Vend_ExibeEst==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Agrupar itens lancados duplicados no Pedido:</b>
                                    <label>{{ $empresa->Vend_AgrupaltPed==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Valor do Frete incorpora o Total do Pedido, OS:</b>
                                    <label>{{ $empresa->Vend_FreteIncorp==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Dias padrao para lancamento de Locacoes:</b>
                                    <label>{{ $empresa->Vend_DiasLocacao }} </label><br>
                                    <b class="ls-label-text">Baixar Estoque em OS com Situação EM ORÇAMENTO:</b>
                                    <label>{{ $empresa->Vend_PedSimp==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Mudar Status de Ordem de Servico ao Faturar:</b>
                                    <label>{{ $empresa->Vend_MudaStatOS==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Utiliza observações de produtos nas buscas:</b>
                                    <label>{{ $empresa->Vend_BuscObs==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Utilizar programa de fidelidade:</b>
                                    <label>{{ $empresa->Vend_ProgFide==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Valor base para computacao de pontos no programa de
                                        fidelidade:</b>
                                    <label>{{ $empresa->Vend_ProgPtos }} </label><br>
                                    <b class="ls-label-text">Cod. Transportadora Padrão:</b>
                                    <label>{{ $empresa->Vend_TranspPadrao }} </label><br>
                                    <b class="ls-label-text">Filtro do Sistema pelo Inicio do Mes:</b>
                                    <label>{{ $empresa->Vend_FiltroIniMes==1? "Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Valor da Hora de Trabalho:</b>
                                    <label>{{ $empresa->Vend_VlrHora }} </label><br>
                                    <b class="ls-label-text">Valor Minimo de Hora de Trabalho:</b>
                                    <label>{{ $empresa->Vend_VlrMinimo }} </label><br>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
