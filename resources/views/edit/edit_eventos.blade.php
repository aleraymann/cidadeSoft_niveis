@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="main-panel" style="margin-top:60px">
    <a href="{{ url()->previous() }}" class="btn btn-primary btn-rounded">
        Voltar
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Evento
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Calendario/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Calendario/update/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class=" form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="cor">Cor de destaque:</b>
                            <input type="color" class="form-control input-border-bottom" name="cor" id="cor"
                            value="{{ isset($events->cor) ? $events->cor : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                         <select class="form-control input-border-bottom" id="cod_usuario" name="cod_usuario" required>
                         @if( $events->cod_usuario == Auth::user()->id )
                             <option value="{{ Auth::user()->id }}"{{ $events->cod_usuario == Auth::user()->id  ? "selected" : "" }}>{{Auth::user()->name}}</option>
                             @endif
                             <option value="{{ Auth::user()->id }}">{{Auth::user()->name}}</option>
                             @foreach($user as $u)
                                @if( $u->adm == Auth::user()->id )
                                    <option value="{{ $u->id }}" {{ $events->cod_usuario == $u->id ? "selected" : "" }}>{{ $u->name }}</option>
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
                            <b class="ls-label-text" for="evento">Titulo do evento:</b>
                            <input type="text" class="form-control input-border-bottom" name="evento" id="evento" required
                                minlength="3" maxlength="20" value="{{ isset($events->evento) ? $events->evento : '' }}">
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
                            <b class="ls-label-text" for="descricao">Descrção:</b>
                            <input type="text" class="form-control input-border-bottom" name="descricao" id="descricao" required
                                minlength="3" maxlength="20" value="{{ isset($events->descricao) ? $events->descricao : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="data_inicio">Data de Início:</b>
                            <input type="date" class="form-control input-border-bottom" name="data_inicio" id="data_inicio"
                                required  value="{{$events->data_inicio}}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="data_fim">Data de Fim:</b>
                            <input type="date" class="form-control input-border-bottom" name="data_fim" id="data_fim"
                                required value="{{ isset($events->data_fim) ? $events->data_fim : '' }}">
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
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
