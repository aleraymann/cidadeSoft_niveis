@extends("template")

@section("conteudo")

<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/os_ped") }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Categoria
                </h4>
            </div>
            <div class="card-body">

                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/CatOSPed/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/CatOSPed/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Descricao">Descrição</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                                value="{{ isset($categoriaos->Descricao) ? $categoriaos->Descricao : '' }}"
                                placeholder="Nome do Funcionário" required minlength="3" maxlength="45">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>

                    </div>


                    {{ csrf_field() }}
                    <button class="btn btn-success">Salvar</button>
                    <a href="{{ url("/Cadastro/os_ped") }}"  class="btn btn-danger ml-3">Cancelar</a>
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
