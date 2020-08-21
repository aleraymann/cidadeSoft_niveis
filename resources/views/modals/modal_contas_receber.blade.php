<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro Contas a Receber</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Contas_Receber/salvar") }}" onsubmit="return checkForm(this);">
                    @else
                        <form method="post" action="{{ url("/Contas_Receber/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Sel">Título Baixado:</b>
                            <select class="form-control input-border-bottom" name="Sel" id="Sel" required>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Num_Doc">Número do Documento:</b>
                            <input type="text" class="form-control input-border-bottom" name="Num_Doc" id="Num_Doc"
                                maxlength="15" minlength="1" required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Parcela">Parcela:</b>
                            <input type="text" class="form-control input-border-bottom" name="Parcela" id="Parcela"
                                maxlength="5" minlength="5" required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Clifor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom" name="Cod_Clifor" id="Cod_Clifor" required>
                                <option value="">Selecione</option>
                                @foreach($clifor as $clifor)
                                    @can('view_clifor', $clifor)
                                        <option value="{{ $clifor->Codigo }}">{{ $clifor->Nome_Fantasia }}</option>
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
                            <b class="ls-label-text" for="Forma_Pag">Forma de Pagamento:</b>
                            <select class="form-control input-border-bottom" name="Forma_Pag" id="Forma_Pag" required>
                                <option value="">Selecione</option>
                                @foreach($f_pag as $f)
                                    @can('view_formPag', $f)
                                        <option value="{{ $f->Codigo }}">{{ $f->Descricao }}</option>
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
                            <b class="ls-label-text" for="Cond_Pag">Cond. de Pagamento:</b>
                            <select class="form-control input-border-bottom" name="Cond_Pag" id="Cond_Pag" required>
                                <option value="">Selecione</option>
                                @foreach($c_pag as $f)
                                    @can('view_condPag', $f)
                                        <option value="{{ $f->Codigo }}">{{ $f->Condicao }}</option>
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
                            <b class="ls-label-text" for="Data_Entrada">Data de Entrada:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data_Entrada"
                                id="Data_Entrada" required minlength="" maxlength="10"
                                value="{{ date('Y-m-d') }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Vencimento">Vencimento:</b>
                            <input type="date" class="form-control input-border-bottom" name="Vencimento"
                                id="Vencimento" required minlength="" maxlength="10">
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
                            <b class="ls-label-text" for="Data_Juros">Data para cobrar Juros:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data_Juros"
                                id="Data_Juros" required minlength="" maxlength="10">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor_Origem">Valor de Origem:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor_Origem" id="Valor_Origem" minlength="3" 
                            maxlength="10" value="0.00" required onblur="valor_Origem()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor_Divida">Valor da Dívida:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor_Divida" id="Valor_Divida" minlength="3" 
                            maxlength="10" value="0.00" required onblur="valor_Divida()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Multa">(%) de Multa :</b>
                            <input type="text" class="form-control input-border-bottom" name="Multa" id="Multa" minlength="3" 
                            maxlength="10" value="0.00" required onblur="multa()">
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
                            <b class="ls-label-text" for="Taxa_Juros">Taxa de Juros :</b>
                            <input type="text" class="form-control input-border-bottom" name="Taxa_Juros" id="Taxa_Juros" minlength="3" 
                            maxlength="3" value="0.00" required onblur="taxa_Juros()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Desconto">Desconto:</b>
                            <input type="text" class="form-control input-border-bottom" name="Desconto" id="Desconto" minlength="3" 
                            maxlength="10" value="0.00" required onblur="desconto()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Juros">Juros:</b>
                            <input type="text" class="form-control input-border-bottom" name="Juros" id="Juros" minlength="3" 
                            maxlength="10" value="0.00" required onblur="juros()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                            <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Divida_Estimada">Estimativa da Dívida:</b>
                            <input type="text" class="form-control input-border-bottom" name="Divida_Estimada" id="Divida_Estimada" minlength="3" 
                            maxlength="10" value="0.00" required onblur="divida_Estimada()">
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
                            <b class="ls-label-text" for="Origem">Local/Nota de Origem:</b>
                            <input type="text" class="form-control input-border-bottom" name="Origem" id="Origem"
                                maxlength="15" minlength="3">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Local_Pag">Local de Pagamento:</b>
                            <select class="form-control input-border-bottom" name="Local_Pag" id="Local_Pag" >
                                <option value="">Selecione</option>
                                <option value="BCO">Banco</option>
                                <option value="CX">Caixa</option>
                                
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Observacoes">Observações Gerais:</b>
                            <input type="text" class="form-control input-border-bottom" name="Observacoes" id="Observacoes"
                                maxlength="80" minlength="3">
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
                            <b class="ls-label-text" for="Nosso_Numero">Boleto no Sistema:</b>
                            <select class="form-control input-border-bottom" name="Nosso_Numero" id="Nosso_Numero"
                            onchange="pesquisarNum()">
                                <option value="">Selecione</option>
                                @foreach($boleto as $boleto)
                                    @can('view_boletoTit', $boleto)
                                    <option value="{{ $boleto->Nosso_Num }}">{{ $boleto->Nosso_Num }}</option>
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
                        <div class="form-group col-lg-1">
                            <b class="ls-label-text" for="Cod_Boleto">Cod:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Boleto" id="Cod_Boleto"
                                maxlength="5" readonly>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-8">
                            <b class="ls-label-text" for="Linha_Digitavel">Linha Digitável:</b>
                            <input type="text" class="form-control input-border-bottom" name="Linha_Digitavel" id="Linha_Digitavel"
                                maxlength="80" minlength="5" >
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
                            <b class="ls-label-text" for="NF">Nota Fiscal:</b>
                            <select class="form-control input-border-bottom" name="NF" id="NF" required>
                                <option value="0">Selecione</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Credito">Crédito Cliente/Fornecedor?</b>
                            <select class="form-control input-border-bottom" name="Credito" id="Credito" required>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Transacao">Transação Financeira:</b>
                            <input type="text" class="form-control input-border-bottom" name="Transacao" id="Transacao"
                                maxlength="11" minlength="2" required>
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
                            <b class="ls-label-text" for="Plano_Ctas">Plano de Contas:</b>
                            <select class="form-control input-border-bottom" name="Plano_Ctas" id="Plano_Ctas" required>
                                <option value="0">Selecione</option>
                                @foreach($planocontas as $c)
                                    @can('view_planocontas', $c)
                                        <option value="{{ $c->Codigo }}">{{ $c->Conta }}</option>
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
                            <b class="ls-label-text" for="Centro_Custo">Centro de Custo:</b>
                            <select class="form-control input-border-bottom" name="Centro_Custo" id="Centro_Custo" required>
                                <option value="">Selecione</option>
                                @foreach($c_cust as $f)
                                    @can('view_centroCusto', $f)
                                        <option value="{{ $f->Codigo }}">{{ $f->Descricao }}</option>
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
                            <b class="ls-label-text" for="Empresa">Empresa:</b>
                            <select class="form-control input-border-bottom" name="Empresa" id="Empresa" required>
                                <option value="">Selecione</option>
                                @foreach($empresa as $e)
                                    @can('view_empresa', $e)
                                        <option value="{{ $e->Codigo }}">{{ $e->Nome_Fantasia }}</option>
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
                                    inputs[idx + 1].select();
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

                            function valor_Origem() {
                                var desc = parseFloat(document.getElementById('Valor_Origem').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Valor_Origem').value = lim;
                            }
                            function valor_Divida() {
                                var desc = parseFloat(document.getElementById('Valor_Divida').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Valor_Divida').value = lim;
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
                            function desconto() {
                                var desc = parseFloat(document.getElementById('Desconto').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Desconto').value = lim;
                            }
                            function juros() {
                                var desc = parseFloat(document.getElementById('Juros').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Juros').value = lim;
                            }
                            function divida_Estimada() {
                                var desc = parseFloat(document.getElementById('Divida_Estimada').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Divida_Estimada').value = lim;
                            }

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
    <script>
    function pesquisarNum(){
            var csrf_token= document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // obrigatorio para qualqer pesquisa tanto get ou post 
            var numBol = $('#Nosso_Numero').val(); // pega o valor marcado, lembra com o change(realiza a ação quando marca um)
            //console.log("numero é "+numBol);// display se ta pegando variavel
            $.ajax({
                    url: '{{url("Contas_Pagar/pesquisa")}}', // qual é o link (funcao que vai fazer a consulta, tem q ter na rota)
                    type: 'POST', // post ou get
                    data: {'_method' : 'POST', '_token' :csrf_token, 'numBoleto': numBol }, // primeiro nome é como vai passar pro outro
                    // repete post ou get(obrigatorio), token =>infoma o token que tem q ter em todo form   ,    e qual parametros vc vai passar tanto(nesse caso só o id laa)
                    dataType: 'json', // tipo dos dados , em json ou xml array 
                    success: function (data){ // se tiver sucesso faz codigo abaixo
                    //console.log(data);
                        if(!data){
                            document.getElementById('Cod_Boleto').value =''; //se nao retornar nada , no caso deu erro lá no codigo
                            return;
                        }else{
                           

                            document.getElementById('Cod_Boleto').value = data;
                            //console.log(data); // só pra debug mesmo dps vc tira

                        }
                    },
            });
}
</script>