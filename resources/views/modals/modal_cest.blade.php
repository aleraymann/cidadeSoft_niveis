
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro CEST</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                <form method="post" class="needs-validation" novalidate action="{{url("/Cest/salvar")}}">
                   @else
                   <form method="post" action="{{url("/Cest/salvar/$id")}}" enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="CEST">CEST:</b>
                            <input type="text" class="form-control input-border-bottom" name="CEST" id="CEST" minlength="3" value=""  maxlength="10">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="NCM">NCM:</b>
                            <select class="form-control input-border-bottom" required id="NCM" name="NCM">
                                <option value="">Selecione</option>
                                @foreach ($ncm as $ncm)
                            <option value="{{$ncm->NCM}}">{{$ncm->NCM}}</option>
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
                            <b class="ls-label-text" for="Descricao	">Descrição:</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                            placeholder=""   minlength="5" maxlength="45">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 5 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
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
                                inputs[idx + 1].select();
                            }
                            return false;
                        }
                    });
                      </script>
                    <div class="form-row">
                     
                        {{ csrf_field() }}
                        <button class="btn btn-success">Cadastrar</button>
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
