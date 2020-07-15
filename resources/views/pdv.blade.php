<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CidadeSoft</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ url("img/CSicone.png") }}" type="image/x-icon" />

    <!-- Fonts and icons -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet"
        type="text/css">
    <script src="{{ url('js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:100,200,300,400,500,600,700,800,900"]
            },
            custom: {
                "families": ["Flaticon", "LineAwesome"],
                urls: ["{{ url('css/fonts.css') }}"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ url("css/ready.min.css") }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ url("css/demo.css") }}">

    <!-- Autentificação para todos os ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

        <div class="bg-primary" style="padding:10px;">
            <!-- Button to Open the Modal -->
            @include('sweetalert::alert')
           
            <a class="btn btn-xs btn-danger float-right mt-auto"   href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="flaticon-arrow"></i>
                {{ __('Sair') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                <a style="font-size:15px;padding:5px;">
                <h6 class="card-title float-left" style="color:white;" >Empresa: {{ $cod_empresa}} - {{ $nome_empresa}}</h6>
            </a>
            <!--end container-->
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class=" col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header bg-primary ">
                            <span class="card-title" style="color:white; height:60%;">Usuário: <strong> {{ Auth::user()->id }} -
                                    {{ Auth::user()->name }} </strong></span>
                            <span class="card-title float-right" style="color:white;">Cx: </span>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ url("img/cidadesoft.jpg") }}" class="img-fluid"
                                style="border-radius:5px;  box-shadow: 3px 3px 5px grey; width:300px;">
                        </div>
                        <div class="card-footer  bg-primary">
                            <span class="card-title" style="color:white;">Cliente:</span>
                            <span class="card-title float-right" style="color:white;">Pedido: </span>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-header bg-primary">
                            <span class="card-title" style="color:white;">Registrar Item:</span>
                        </div>
                        <div class="card-body text-center">
                            <form method="post" class="needs-validation" novalidate action="">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <b class="ls-label-text" for="">Quantidade</b>
                                        <input type="text" class="form-control input-border-bottom" name="" id=""
                                            placeholder="" required minlength="1" maxlength="5">
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
                                        <b class="ls-label-text" for="">Cod de Barras</b>
                                        <input type="text" class="form-control input-border-bottom" name="" id=""
                                            placeholder="" required minlength="1" maxlength="5">
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                </div>
                                <span class="float-left">Valor Unitário:</span>
                        </div>
                        <div class="card-footer  bg-primary">
                            {{ csrf_field() }}
                            <input class="btn btn-danger" id="reset" type='reset' value='Cancelar Venda' />
                            <button class="btn btn-success float-right">Finalizar Venda</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8" >
            <div class=" col-md-12 mt-2">
                    <div class="card ">
                        <div class="card-header bg-primary">
                            <span class="card-title" style="color:white; height: 100px;">Lista de Produtos:</span>
                        </div>
                        <div class="card-body text-center">
                            <div class="table-responsive">
                                <table id="multi-filter-select"
                                    class="display table table-striped table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="">CALC_orden</th>
                                            <th class="">cod_dav_itens</th>
                                            <th class="">cod_dav </th>
                                            <th class="">cod_produto</th>
                                            <th class="">dav_qtde</th>
                                            <th class="">dav_unitario</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer  bg-primary">
                            <p class="ml-3" style="color:white;">Quantidade:</p>
                            <p class="float-right" style="color:white; font-size:20px">Total(R$):</p>
                            <p class="ml-3" style="color:white;">Subtotal:</p>
                            <p class="ml-3" style="color:white;">Desconto:</p>
                            <!--<p  style="color:white;"> 
                            <button class="btn btn-primary"  data-toggle="modal"
                        data-target="#myModal">Desconto:</button>
                        </p>-->
                            @include("modals.modal_desconto")
                        </div>
                    </div>
                </div>
            </div>
        </div>



</html>
