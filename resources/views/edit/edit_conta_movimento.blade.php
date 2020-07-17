@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Cod_Banco").mask("999999");
        $("#Dig_Banco").mask("99");
        $("#Cod_Banco_Cob").mask("999999");
        $("#Dig_Banco_Cob").mask("99");
        $("#Cod_Age").mask("999999");
        $("#Dig_Age").mask("99");
        $("#CC").mask("999999");
        $("#Digito").mask("99");
        $("#Carteira").mask("99");
        $("#Uso_Bco").mask("9999");
        $("#Cod_Moeda").mask("99");
        $("#Dias_Desc").mask("99");
        $("#Perc_Desc").mask("9.99");
        $("#Perc_Multa").mask("9.99");
        $("#Perc_Juros").mask("9.99");
        $("#Dias_AvisoProt").mask("99");
        $("#Dias_Prot").mask("99");
        $("#Tx_Emissao").mask("9.99");
    });

</script>



<div class="main-panel" style="margin-top:60px">
    <a href="{{ url()->previous() }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Movimento de Contas
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                    <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Movimento/salvar") }}">
                    @else
                        <form method="post" action="{{ url("/Movimento/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif
                
          </div>
                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="data_id">Data do Movimento:</b>
                        <select class="form-control input-border-bottom" name="data_id" id="data_id" required disabled>
                                <option value="">Selecione</option>
                                @foreach($data_movimento as $data)
                                @can('view_data_movimento', $data)
                                <option value="{{ $data->Codigo }}"
                                        {{ $conta_movimento->data_id == $data->Codigo ? "selected" : "" }}>
                                        {{ $data->Data }}</option>
                                @endcan
                                @endforeach
                            </select>
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Especie">Espécie do Movimento:</b>
                            <select class="form-control input-border-bottom" name="Especie" id="Especie" required>
                            <option value="{{ isset($conta_movimento->Especie) ? $conta_movimento->Especie : '' }} ">
                                    @if($conta_movimento->Especie == 1)
                                            Dinheiro
                                    @elseif($conta_movimento->Especie == 2)
                                            Cheque
                                    @else
                                            Cartão
                                    @endif
                                    </option>
                                <option value="">Selecione</option>
                                <option value="1">Dinheiro</option>
                                <option value="2">Cheque</option>
                                <option value="3">Cartão</option>
                                
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Documento">Tipo do Movimento:</b>
                            <select class="form-control input-border-bottom" name="Documento" id="Documento" required>
                            <option value="{{ isset($conta_movimento->Documento) ? $conta_movimento->Documento : '' }} ">
                                    @if($conta_movimento->Especie == "NFF")
                                            Nota Fiscal
                                    @else
                                            Recibo
                                    @endif
                                    </option>
                                <option value="NFF">Nota Fiscal</option>
                                <option value="REC">Recibo</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Num_Doc">Número do Documento:</b>
                        <input type="text" class="form-control input-border-bottom" name="Num_Doc" id="Num_Doc"
                            maxlength="15" minlength="1" required  value="{{ isset($conta_movimento->Num_Doc) ? $conta_movimento->Num_Doc : '' }} ">
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
                            <b class="ls-label-text" for="Nome_Clifor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom" onchange="pesquisarCodigo()" name="Nome_Clifor" id="Nome_Clifor" required>
                                <option value="">Selecione</option>
                                @foreach($clifor as $clifor)
                                   @can('view_clifor', $clifor)
                                   <option value="{{ $clifor->Nome_Fantasia }}"
                                        {{ $conta_movimento->Nome_Clifor == $clifor->Nome_Fantasia ? "selected" : "" }}>
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


                    <div class="form-group col-lg-2">
                        <b class="ls-label-text" for="Cod_Clifor">Cod Cli/For:</b>
                        <input type="text" class="form-control input-border-bottom" name="Cod_Clifor" id="Cod_Clifor"
                            readonly  value="{{ isset($conta_movimento->Cod_Clifor) ? $conta_movimento->Cod_Clifor : '' }} ">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-5">
                        <b class="ls-label-text" for="Historico">Hist. do Movimento:</b>
                        <input type="text" class="form-control input-border-bottom" name="Historico" id="Historico"
                            required minlength="3" maxlength="45" value="{{ isset($conta_movimento->Historico) ? $conta_movimento->Historico : '' }} ">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Valor">Valor:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor" minlength="3" 
                            maxlength="10" required onblur="valor()" value="{{ isset($conta_movimento->Valor) ? $conta_movimento->Valor : '' }} ">
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
                        <b class="ls-label-text" for="Operador">Operador:</b>
                        <select class="form-control input-border-bottom" name="Operador" id="Operador" required>
                        <option value="{{ isset($conta_movimento->Operador) ? $conta_movimento->Operador : '' }} ">
                                    @if($conta_movimento->Especie == "C")
                                            Crédito
                                    @else
                                            Débito
                                    @endif
                                    </option>
                            <option value="C">Crédito</option>
                            <option value="D">Débito</option>
                        </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                    </div>
                    <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Conta">Conta:</b>
                            <select class="form-control input-border-bottom" name="Cod_Conta" id="Cod_Conta" required
                            onchange="defineSub()">
                                <option value="">Selecione</option>
                                @foreach($conta as $conta)
                                   @can('view_conta', $conta)
                                   <option value="{{$conta->Codigo }}"
                                        {{ $conta_movimento->Cod_Conta == $conta->Codigo ? "selected" : "" }}>
                                        Ag:{{ $conta->Cod_Age }}-{{ $conta->Dig_Age }} / CC:{{ $conta->CC }}-{{$conta->Digito}}</option>
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
                            <b class="ls-label-text" for="Cod_Conta_Saldo">Conta Saldo:</b>
                            <select class="form-control input-border-bottom" name="Cod_Conta_Saldo"  id="Cod_Conta_Saldo" required>
                             <option value="{{ $conta_movimento->Cod_Conta_Saldo }}">{{ $conta_movimento->Cod_Conta_Saldo }}</option>
                              
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Plano_Ctas">Plano de Contas:</b>
                            <select class="form-control input-border-bottom" name="Plano_Ctas" required>
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
                <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Centro_Custo">Centro de Custo:</b>
                            <select class="form-control input-border-bottom" name="Centro_Custo" required>
                                <option value="">Selecione</option>
                                @foreach($custo as $custo)
                                   @can('view_centroCusto', $custo)
                                   <option value="{{ $custo->Codigo }}"
                                        {{ $conta_movimento->Centro_Custo == $custo->Codigo ? "selected" : "" }}>
                                        {{ $custo->Descricao }}</option>
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
                            <b class="ls-label-text" for="Transacao">Número da Transação:</b>
                            <input type="text" class="form-control input-border-bottom" name="Transacao" id="Transacao" minlength="2" 
                            maxlength="11" value="{{ isset($conta_movimento->Transacao) ? $conta_movimento->Transacao : '' }} " required >
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Empresa">Empresa:</b>
                            <select class="form-control input-border-bottom" name="Empresa" required>
                                <option value="">Selecione</option>
                                @foreach($empresa as $empresa)
                                   @can('view_empresa', $empresa)
                                   <option value="{{ $empresa->Codigo }}"
                                        {{ $conta_movimento->Empresa == $empresa->Codigo ? "selected" : "" }}>
                                        {{ $empresa->Nome_Fantasia }}</option>
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

                            }
                            return false;
                        }
                    });

                </script>
                <div class="form-row">
                    {{ csrf_field() }}
                    <button class="btn btn-success">Salvar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancelar</a>
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

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script type="text/javascript">

 
function valor() {
       var desc = parseFloat(document.getElementById('Valor').value, 2);
       lim = desc.toFixed(2);
       document.getElementById('Valor').value = lim;
   }

</script>
<script>
   function defineSub(){
           var csrf_token= document.querySelector('meta[name="csrf-token"]').getAttribute('content');
           var idConta = $('#Cod_Conta').val();
           $.ajax({
                   url: '{{url("Movimento/pesquisaSaldo")}}',
                   type: 'POST',
                   data: {'_method' : 'POST', '_token' :csrf_token, 'id_conta': idConta },
                   dataType: 'json',
                   success: function (data){
                       if(!data){
                           $('select[name=Cod_Conta_Saldo]').find("option").remove().end().append('<option value="">  </option>').val("");
                           return;
                       }else{
                           $('select[name=Cod_Conta_Saldo]').empty();
                           for (index = 0; index < data.length; ++index) {
                               //console.log(data[index]);
                               $('select[name=Cod_Conta_Saldo]').empty().append('<option value="'+data[0]['Codigo']+'">'+data[0]['Data']+'</option>');
                           }
                       }
                   },
           });
}
</script>
<script>
   function pesquisarCodigo(){
           var csrf_token= document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // obrigatorio para qualqer pesquisa tanto get ou post 
           var nomeCli = $('#Nome_Clifor').val(); // pega o valor marcado, lembra com o change(realiza a ação quando marca um)
           $.ajax({
                   url: '{{url("Movimento/pesquisa")}}', // qual é o link (funcao que vai fazer a consulta, tem q ter na rota)
                   type: 'POST', // post ou get
                   data: {'_method' : 'POST', '_token' :csrf_token, 'nomeCliente': nomeCli }, // primeiro nome é como vai passar pro outro
                   // repete post ou get(obrigatorio), token =>infoma o token que tem q ter em todo form   ,    e qual parametros vc vai passar tanto(nesse caso só o id laa)
                   dataType: 'json', // tipo dos dados , em json ou xml array 
                   success: function (data){ // se tiver sucesso faz codigo abaixo
                       if(!data){
                           //$('select[name=subcategory_id]').find("option").remove().end().append('<option value="">  </option>').val("");
                           document.getElementById('Cod_Clifor').value =''; //se nao retornar nada , no caso deu erro lá no codigo
                           return;
                       }else{
                           //$('select[name=subcategory_id]').empty(); isso é pro subcategoria , toda vez q pesquisa ele zera pra mostrar os novos dados
                           /*for (index = 0; index < data.length; ++index) {
                               //console.log(data[index]);
                               $('select[name=subcategory_id]').empty().append('<option value="'+data[0]['id']+'">'+data[0]['descricao']+'</option>');
                           }*/  //vai retornar apenas um dado, nao um loop

                           document.getElementById('Cod_Clifor').value = data;
                           console.log(data); // só pra debug mesmo dps vc tira

                       }
                   },
           });
}
</script>