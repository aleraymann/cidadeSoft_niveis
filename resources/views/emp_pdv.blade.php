@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#cnpj").mask("99.999.999/9999-99");
    });
</script>

<div class="main-panel">
    <div style="margin-top:60px">
        <!-- Button to Open the Modal -->
        @include('sweetalert::alert')
        <!--end container-->
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2" ></div>
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Entre com o CNPJ da Empresa</h4>
            </div>
            <div class="card-body">
            <form method="post" action="{{ url("/pdv/pdv") }}"
                            enctype="multipart/form-data">
            <div class="form-row container">
                    <div class="form-group col-lg-3 m-auto text-center">
                            <b class="ls-label-text" for="cnpj">CNPJ:</b>
                            <input type="text" class="form-control input-border-bottom" name="cnpj" id="cnpj" 
                             onblur="pesquisaAjax()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-1 text-center  m-auto">
                            <b class="ls-label-text" for="cod_empresa">Cod:</b>
                            <input type="text" class="form-control input-border-bottom" name="cod_empresa" id="cod_empresa"
                                maxlength="5" readonly>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4  text-center  m-auto">
                            <b class="ls-label-text" for="Nome_Fantasia">Nome Fantasia:</b>
                            <input type="text" class="form-control input-border-bottom" name="Nome_Fantasia" id="Nome_Fantasia"
                                maxlength="5" readonly>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        </div>
                        </div>
            <div class="card-footer" id="botao" hidden>
            {{ csrf_field() }}
            <button class="btn btn-primary">Entrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    function pesquisaAjax(){
            var csrf_token= document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // obrigatorio para qualqer pesquisa tanto get ou post 
            var cnpj = $('#cnpj').val(); // pega o valor marcado, lembra com o change(realiza a ação quando marca um)
            //console.log("numero é "+numBol);// display se ta pegando variavel
            $.ajax({
                    url: '{{url("pdv/pesquisa")}}', // qual é o link (funcao que vai fazer a consulta, tem q ter na rota)
                    type: 'POST', // post ou get
                    data: {'_method' : 'POST', '_token' :csrf_token, 'CNPJ': cnpj }, // primeiro nome é como vai passar pro outro
                    // repete post ou get(obrigatorio), token =>infoma o token que tem q ter em todo form   ,    e qual parametros vc vai passar tanto(nesse caso só o id laa)
                    dataType: 'json', // tipo dos dados , em json ou xml array 
                    success: function (data){ // se tiver sucesso faz codigo abaixo
                    //console.log(data);
                        if(data != null){        
                            console.log(data);                     
                            document.getElementById('Nome_Fantasia').value =data['Nome_Fantasia']; //se nao retornar nada , no caso deu erro lá no codigo
                            document.getElementById('cod_empresa').value =data['Codigo'];
                                if(data['Codigo'] != null){
                                    var botao = document.getElementById('botao');
                                    botao.hidden = false;
                                }
                            return;
                        }else{                       

                            document.getElementById('cod_empresa').value = '';
                            document.getElementById('Nome_Fantasia').value = '';
                            // aqui é se der erro, se der erro muda pra vaziu
                            console.log(data); // só pra debug mesmo dps vc tira

                        }
                    },
            });
}
</script>