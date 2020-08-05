

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Boleto Título</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
        
          <form method="post" class="needs-validation" novalidate action="{{url("/Boleto_titulo/salvar")}}"  onsubmit="return checkForm(this);">
         
            <div class="form-row">
            <div class="form-group col-lg-12" hidden>
              <b class="ls-label-text" for="user_id">User_ID:</b>
              <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
              readonly  value="
                            @if(Auth::user()->hasAnyRoles('adm') || Auth::user()->hasAnyRoles('s_adm'))
                            {{ Auth::user()->id }}
                            @else
                            {{ Auth::user()->adm }}
                            @endif" >
            </div>
          </div>
            <div class="form-row">
             
              <div class="form-group col-lg-3">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Sel" name="Sel" value="1"> Baixa/Envio ao Banco
                    </label>
                  </div>
              </div>
              <div class="form-group col-lg-3">
                <b class="ls-label-text" for="Cod_Conta">Conta:</b>
                <select class="form-control  input-border-bottom" id="Cod_Conta" name="Cod_Conta">
                  <option value="0">Selecione</option>
                  @foreach($conta as $conta)
                  @can('view_conta', $conta)
                  <option value="{{$conta->Codigo}}">Ag:{{ $conta->Cod_Age }}-{{ $conta->Dig_Age }} / CC:{{ $conta->CC }}-{{ $conta->Digito }}</option>
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
                <b class="ls-label-text" for="Data_Doc">Data do Documento:</b>
                <input type="text" class="form-control input-border-bottom" name="Data_Doc" id="Data_Doc"  value="{{ date('Y-m-d') }}"  required readonly>
                <div class="invalid-feedback">
                  Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                  Tudo certo!
                </div>
              </div>
              <div class="form-group col-lg-3">
                <b class="ls-label-text" for="Vencimento">Data de Vencimento</b>
                <input type="date" class="form-control input-border-bottom" name="Vencimento" id="Vencimento" required placeholder="DD/MM/AAAA">
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
                    <b class="ls-label-text" for="Nro_Doc">Num do Doc no Sistema:</b>
                    <input type="text" class="form-control input-border-bottom" name="Nro_Doc" id="Nro_Doc" required maxlength="14" min="10">
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                      </div>
                      <div class="valid-feedback">
                        Tudo certo!
                      </div>
                  </div>
                  <div class="form-group col-lg-3">
                    <b class="ls-label-text" for="Nosso_Num">Num do Titulo no Banco:</b>
                    <input type="text" class="form-control input-border-bottom" name="Nosso_Num" id="Nosso_Num" required maxlength="20" min="10">
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                      </div>
                      <div class="valid-feedback">
                        Tudo certo!
                      </div>
                  </div>
                  <div class="form-group col-lg-2">
                    <b class="ls-label-text" for="Valor">Valor:</b>
                    <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor" 
                    onblur="valor()"required maxlength="10" min="3" value="0.00">
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                      </div>
                      <div class="valid-feedback">
                        Tudo certo!
                      </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Msg_1">Mensagem a ser impressa 1:</b>
                    <input type="text" class="form-control input-border-bottom" name="Msg_1" id="Msg_1" required maxlength="45" min="5">
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
                    <b class="ls-label-text" for="Msg_2">Mensagem a ser impressa 2:</b>
                    <input type="text" class="form-control input-border-bottom" name="Msg_2" id="Msg_2" required maxlength="45" min="5">
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                      </div>
                      <div class="valid-feedback">
                        Tudo certo!
                      </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Msg_3">Mensagem a ser impressa 3:</b>
                        <input type="text" class="form-control input-border-bottom" name="Msg_3" id="Msg_3" required maxlength="45" min="5">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                          </div>
                          <div class="valid-feedback">
                            Tudo certo!
                          </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Inst_1">instruçao para cobrança 1:</b>
                            <input type="text" class="form-control input-border-bottom" name="Inst_1" id="Inst_1" required maxlength="5" min="1">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                              </div>
                              <div class="valid-feedback">
                                Tudo certo!
                              </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Inst_2">instruçao para cobrança 2:</b>
                                <input type="text" class="form-control input-border-bottom" name="Inst_2" id="Inst_2" required maxlength="5" min="1">
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
                    <b class="ls-label-text" for="Multa">Percentual de Multa:</b>
                    <input type="text" class="form-control input-border-bottom" name="Multa" id="Multa" 
                    onblur="multa()"required maxlength="3" min="3" value="0.00">
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                      </div>
                      <div class="valid-feedback">
                        Tudo certo!
                      </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Taxa_Juros">Percentual de Juros:</b>
                        <input type="text" class="form-control input-border-bottom" name="Taxa_Juros" id="Taxa_Juros" 
                        onblur="taxa_Juros()"required maxlength="3" min="3" value="0.00">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                          </div>
                          <div class="valid-feedback">
                            Tudo certo!
                          </div>
                    </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Acrescimo">Valor do Acrescimo:</b>
                            <input type="text" class="form-control input-border-bottom" name="Acrescimo" id="Acrescimo"
                            onblur="acrescimo()"required maxlength="10" min="3" value="0.00">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                              </div>
                              <div class="valid-feedback">
                                Tudo certo!
                              </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Desconto">Valor do Desconto:</b>
                                <input type="text" class="form-control input-border-bottom" name="Desconto"
                                onblur="desconto()" id="Desconto" required maxlength="10" min="3" value="0.00">
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
                    <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                    <select class="form-control input-border-bottom" id="Cod_CliFor" name="Cod_CliFor">
                      <option value="0">Selecione</option>
                      @foreach($clifor as $clifor)
                        @can('view_clifor', $clifor)
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
                  <div class="form-group col-lg-3">
                    <b class="ls-label-text" for="Cod_NF">Nota Fical:</b>
                    <select class="form-control input-border-bottom" id="Cod_NF" name="Cod_NF">
                      <option value="0">Selecione</option>
                    </select>
                    <div class="invalid-feedback">
                      Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                      Tudo certo!
                    </div>
                  </div>
                  <div class="form-group col-lg-3">
                    <b class="ls-label-text" for="Cod_CtaRec">Código Contas a Receber:</b>
                    <select class="form-control input-border-bottom" id="Cod_CtaRec" name="Cod_CtaRec">
                      <option value="">Selecione</option>
                      @foreach($ctas_receber as $c)
                                    @can('view_ctas_receber', $c)
                                        <option value="{{ $c->Codigo }}">{{ $c->Num_Doc }}</option>
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
                    <b class="ls-label-text" for="Data_Bai">Data de Baixa</b>
                    <input type="date" class="form-control input-border-bottom" name="Data_Bai" id="Data_Bai"  required>
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
                    <b class="ls-label-text" for="Data_Liq">Data de Liquidação</b>
                    <input type="date" class="form-control input-border-bottom" name="Data_Liq" id="Data_Liq" required >
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                      </div>
                      <div class="valid-feedback">
                        Tudo certo!
                      </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Situacao">Situação do Título</b>
                    <select class="form-control input-border-bottom" id="Situacao" name="Situacao">
                      <option value="C">Carteira</option>
                      <option value="B">Baixado</option>
                      <option value="L">Liquidado</option>
                      <option value="V">Vencido</option>
                    </select>
                    <div class="invalid-feedback">
                      Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                      Tudo certo!
                    </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Cod_Rem">Num da Remessa:</b>
                    <select class="form-control input-border-bottom" id="Cod_Rem" name="Cod_Rem">
                      <option value="0">Selecione</option>
                      @foreach($boleto_remessa as $boleto_remessa)
                        @can('view_boletoRem', $boleto_remessa)
                          <option value="{{$boleto_remessa->Codigo}}">{{ $boleto_remessa->Numero_Rem }}</option>
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
                    <b class="ls-label-text" for="Transacao">Num da Transação:</b>
                    <input type="text" class="form-control input-border-bottom" name="Transacao" id="Transacao" required maxlength="10" min="1">
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
                      <option value="{{$empresa->Codigo}}">{{ $empresa->Razao_Social }}</option>
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
              <button class="btn btn-success" name="cadastrar">Cadastrar</button>
              <input  class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos'/>
            </form>
          </div>
        </div>
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
  
        <!-- Modal footer -->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
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
      
      alert("CPF inválido! - " + el.value);
  
      // apaga o valor
      el.value = "";
    }else{
        
    }
  }
  function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }
    function multa() {
        var desc = parseFloat(document.getElementById('Multa').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Multa').value = lim;
    }
    function taxa_Juros() {
        var desc = parseFloat(document.getElementById('Taxa_Juros').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Taxa_Juros').value = lim;
    }
    function acrescimo() {
        var desc = parseFloat(document.getElementById('Acrescimo').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Acrescimo').value = lim;
    }
    function desconto() {
        var desc = parseFloat(document.getElementById('Desconto').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Desconto').value = lim;
    }
  </script>