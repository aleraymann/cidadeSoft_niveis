<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-md">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Plano de Contas
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/PlanoContas/salvar") }}" onsubmit="return checkForm(this);">
                <div class="form-row">
                <div class="form-group col-lg-12" hidden>
              <b class="ls-label-text" for="user_id">User_ID:</b>
              <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
              readonly value="
              @if(Auth::user()->hasAnyRoles('adm') || Auth::user()->hasAnyRoles('s_adm'))
                            {{ Auth::user()->id }}
                            @else
                            {{ Auth::user()->adm }}
                            @endif" >
            </div>
          </div>
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Conta">Num de Classificação:</b>
                        <input type="text" class="form-control input-border-bottom" name="Conta" id="Conta" placeholder=""
                            required minlength="" maxlength="15">
                        <div class="invalid-feedback">
                            Campo Obrigatório!!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Tipo_Custo">Tipo de Custo:</b>
                            <select class="form-control input-border-bottom" id="Tipo_Custo" name="Tipo_Custo">
                                <option value="CF">Custo Fixo</option>
                                <option value="CV">Custo Variável</option>  
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="CD">Crédito/Débito:</b>
                            <select class="form-control input-border-bottom" id="CD" name="CD">
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
                       
                </div>
                <div class="form-row">
                <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="CodPai">Categoria:</b>
                            <select class="form-control input-border-bottom" required id="CodPai" name="CodPai" onchange="defineSub()">
                                <option value="">Selecione</option>
                                @foreach ($cat_planocontas as $c)
                                @can('view_cat_planocontas', $c)
                            <option value="{{$c->Codigo}}">{{$c->Descricao}}</option>
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
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Descricao">Sub-Categoria:</b>
                            <select class="form-control input-border-bottom" required id="Descricao" name="Descricao">
                                <option value="">Selecione</option>
                               
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
                    <button class="btn btn-success" name="cadastrar">Cadastrar</button>
                    <input class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos' />
                    </form>
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
    function defineSub() {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var id = $('#CodPai').val();
        //console.log("Id da categoria ->"+id) mostra se ta pegando o id do input
        $.ajax({
            url: '{{ url("PlanoContas/pesquisa") }}',
            type: 'POST',
            data: {
                '_method': 'POST',
                '_token': csrf_token,
                'id': id
            },
            dataType: 'json',
            success: function (data) {
                if (!data) {
                    $('select[name=Descricao]').find("option").remove().end().append(
                        '<option value="">  </option>').val("");
                    return;
                } else { // sucesso
                    //console.log(data); //mostra o conteudo do array em questao do loop
                    $('select[name=Descricao]').empty();
                   
                    for (index = 0; index < data.length; ++index) {
                        //console.log(data[index]);
                        $('select[name=Descricao]').append('<option value="'+data[index]['Descricao']+'">'+data[index]['Descricao']+'</option>');
                    } 

                }
            },
        });
    }

</script>