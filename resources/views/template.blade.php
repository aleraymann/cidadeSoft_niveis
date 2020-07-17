
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>CidadeSoft</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{url("img/CSicone.png")}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="{{url('js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Montserrat:100,200,300,400,500,600,700,800,900"]},
			custom: {"families":["Flaticon", "LineAwesome"], urls: ["{{url('css/fonts.css')}}"]},
			active: function() {
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
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header">
				<!--
					Tip 1: You can change the background color of the logo header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
				-->
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="la la-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<!-- End Logo Header -->
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
				<!--
					Tip 1: You can change the background color of the navbar header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
				-->
				<div class="container-fluid">
					<div class="navbar-minimize">
						<button class="btn btn-minimize btn-rounded">
							<i class="la la-navicon"></i>
						</button>
					</div>
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						<!--<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flaticon-envelope-1"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>-->
						<!--<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flaticon-alarm"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="{{url("img/profile2.jpg")}}" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>-->
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
							@if(auth()->user()->image != null)
								<img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="image profile" width="40" height="40" class="img-circle"></a>
							@else
								<img src="{{url("img/profile.jpg")}}" alt="Img Profile" width="36" class="img-circle">
							@endif
							
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="u-text">
											<h4>{{ Auth::user()->name }}</h4>
											<p class="text-muted">{{ Auth::user()->email }} </p>
											
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href='{{ url("/User/profile") }}'>Meu Perfil</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href='{{ url("/User/edit_profile") }}'>Editar Perfil</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									{{ __('Sair') }}
								  </a>
								  
								  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								  </form>
								</li>
							</ul>
						</li>
						<!--<li class="nav-item">
							<a href="#" class="nav-link quick-sidebar-toggler">
								<i class="flaticon-shapes-1"></i>
							</a>
						</li>-->
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			<!--
				Tip 1: You can change the background color of the sidebar using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
				Tip 2: you can also add an image using data-image attribute
			-->
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="photo">
						@if(auth()->user()->image != null)
								<img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="image profile"  class="img-circle"></a>
							@else
								<img src="{{url("img/profile.jpg")}}" alt="Img Profile" class="img-circle">
							@endif
							
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									@if( Auth::user()->hasAnyRoles('s_adm'))
										<span class="user-level">Super-Admin</span>
									@elseif( Auth::user()->hasAnyRoles('adm'))
										<span class="user-level">Administrador</span>
										<div class="dropdown-divider"></div>
										Cod de Identif.: {{ Auth::user()->id }}
									@elseif( Auth::user()->hasAnyRoles('funcionario'))
										<span class="user-level">Vendedor</span>
										<div class="dropdown-divider"></div>
										Cod de Identif: {{ Auth::user()->id }}
										<br>
										Cod do Admin: {{ Auth::user()->adm }}
									@elseif( Auth::user()->hasAnyRoles('financeiro'))
										<span class="user-level">Financeiro</span>
										<div class="dropdown-divider"></div>
										Cod de Identif.: {{ Auth::user()->id }}
										<br>
										Cod do Admin: {{ Auth::user()->adm }}
									@endif
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
								@can('view_users')
									<li>
										<a href="{{url("/Permission")}}">
											<span class="link-collapse">Permissões</span>
										</a>
									</li>
									<li>
										<a href="{{url("/Ger_perm")}}">
											<span class="link-collapse">Gerenciar Permissões</span>
										</a>
									</li>
									<li>
										<a href="{{url("/Role")}}">
											<span class="link-collapse">Cargos</span>
										</a>
									</li>
									<li>
									<a href="{{ url("/Cargo") }}">
											<span class="link-collapse">Gerenciar Cargos</span>
										</a>
									</li>
									<li>
										<a href="{{url("/User")}}">
											<span class="link-collapse">Usuários</span>
										</a>
									</li>
									@endcan
								<div class="dropdown-divider"></div>
									<li>
									<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									<i class="flaticon-arrow"></i>
									{{ __('Sair') }}
								  </a>
								  
								  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								  </form>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				
					<ul class="nav">
						<li class="nav-item active">
							<a href="{{url("/Dashboard")}}">
								<i class="flaticon-home"></i>
								<p>Início</p>
							</a>
						</li>
						@can('menu')
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Utilitários</h4>
						</li>
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#cadast">
								<i class="flaticon-agenda-1"></i>
								<p>Cadastros</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="cadast">
								<ul class="nav nav-collapse">
								<li>
										<a class="collapse-item" href="{{url('/Cadastro/empresas')}}">
											<span class="sub-item">Empresas</span>
										</a>
									</li>
								@can('insere_func')
									<li>
										<a class="collapse-item" href="{{url('/Cadastro/funcionarios')}}">
											<span class="sub-item">Funcionários</span>
										</a>
									</li>
								@endcan
								@can('visual_cliente')
									<li>
										<a class="collapse-item" href="{{url('/Cadastro/Clifor')}}">
											<span class="sub-item">Clientes/Fornecedores</span>
										</a>
									</li>
								@endcan
								@can('visual_transp')
									<li>
										<a class="collapse-item" href="{{url('/Cadastro/transportadoras')}}">
											<span class="sub-item">Transportadoras</span>
										</a>
									</li>
								@endcan
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#contas">
								<i class='la la-newspaper-o' style='font-size:20px'></i>
								<p>Contas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="contas">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/Cadastro/ctas_pagar')}}">
											<span class="sub-item">Contas a Pagar</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/ctas_pagas')}}">
											<span class="sub-item">Contas Pagas</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/ctas_receber')}}">
											<span class="sub-item">Contas Receber</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/ctas_recebidas')}}">
											<span class="sub-item">Contas Recebidas</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#osped">
								<i class="flaticon-box-2"></i>
								<p>OS e Pedidos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="osped">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/Cadastro/os_ped')}}">
											<span class="sub-item">Categoria para Totalização no Pedido</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/adicional_osped')}}">
											<span class="sub-item">Adicional OS/Pedido</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						@can('view_financeiro')
						<li class="nav-item">
							<a data-toggle="collapse" href="#financ">
								<i class="flaticon-technology"></i>
								<p>Pagamento</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="financ">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/Cadastro/cond_pag')}}">
											<span class="sub-item">Condições de Pagamento</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/form_pag')}}">
											<span class="sub-item">Formas de pagamento</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/centrocusto')}}">
											<span class="sub-item">Centro de Custo</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/convenio')}}">
											<span class="sub-item">Convênio</span>	
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/cotacao')}}">
											<span class="sub-item">Cotação</span>	
										</a>
									</li>
								</ul>
							</div>
						</li>
						@endcan
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#bolet">
								<i class='la la-barcode' style='font-size:20px'></i>
								<p>Boleto</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="bolet">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/Cadastro/boleto_remessa')}}">
											<span class="sub-item">Remessa</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/boleto_titulo')}}">
											<span class="sub-item">Titulo</span>
										</a>
									</li>
								
								</ul>
							</div>
						</li>
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#banco">
								<i class='la la-bank'></i>
								<p>Banco</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="banco">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/Cadastro/conta')}}">
											<span class="sub-item">Conta Bancária</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/movimento')}}">
											<span class="sub-item">Movimento de Conta</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#contrato">
								<i class='la la-briefcase'></i>
								<p>Contrato</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="contrato">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/Cadastro/contrato')}}">
											<span class="sub-item">Contrato Cliente/Fornecedor</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#imposto">
								<i class="flaticon-coins"></i>
								<p>Imposto</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="imposto">
								<ul class="nav nav-collapse">
								<li>
										<a href="{{url('/Cadastro/ncm')}}">
											<span class="sub-item">NCM</span>
										</a>
									</li>
									<li>
										<a href="{{url('/Cadastro/cest')}}">
											<span class="sub-item">CEST</span>
										</a>
									</li>									
								</ul>
							</div>
						</li>
						
						<li class="nav-item">
							<a href="{{url('/Calendario')}}">
								<i class="flaticon-calendar"></i>
								<p>Calendário</p>
								
							</a>
						</li>
						<!--<li class="nav-item">
							<a href="{{url('/pdv')}}">
								<i class="flaticon-cart-1"></i>
								<p>PDV</p>
								
							</a>
						</li>-->

					@endcan
					@can('gerar_relatorio')
						<li class="nav-item">
							<a data-toggle="collapse" href="#relatorio">
								<i class="flaticon-file"></i>
								<p>Relatórios</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="relatorio">
								<ul class="nav nav-collapse">
									<li>
										<a href='{{ url("/pdf_empresas") }}' target='blank'>
											<span class="sub-item">Empresas</span>
										</a>
									</li>
									<li>
										<a href='{{ url("/pdf_funcionarios") }}'target='blank'>
											<span class="sub-item">Funcionarios</span>
										</a>
									</li>
									<li>
										<a href='{{ url("/pdf_clifor") }}'target='blank'>
											<span class="sub-item">Clientes/Fornecedores</span>
										</a>
									</li>
									<li>
										<a href='{{ url("/pdf_transportadoras") }}'target='blank'>
											<span class="sub-item">Transportadoras</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						@endcan
						<li class="nav-item">
						<a href="{{url('/Maps')}}">
								<i class="flaticon-placeholder"></i>
								<p>Encontre-nos</p>
							</a>
						</li>
						
						<!--<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Snippets</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="flaticon-placeholder"></i>
								<p>Maps</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="maps/googlemaps.html">
											<span class="sub-item">Google Maps</span>
										</a>
									</li>
									<li>
										<a href="maps/fullscreenmaps.html">
											<span class="sub-item">Full Screen Maps</span>
										</a>
									</li>
									<li>
										<a href="maps/jqvmap.html">
											<span class="sub-item">JQVMap</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="charts.html">
								<i class="flaticon-graph"></i>
								<p>Charts</p>
								<span class="badge badge-count badge-primary">8</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="calendar.html">
								<i class="flaticon-calendar"></i>
								<p>Calendar</p>
								<span class="badge badge-count badge-info">1</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="widgets.html">
								<i class="flaticon-web"></i>
								<p>Widgets</p>
								<span class="badge badge-count badge-success">4</span>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#email-nav">
								<i class="flaticon-mailbox"></i>
								<p>Email</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="email-nav">
								<ul class="nav nav-collapse">
									<li>
										<a href="email-inbox.html">
											<span class="sub-item">Inbox</span>
										</a>
									</li>
									<li>
										<a href="email-compose.html">
											<span class="sub-item">Email Compose</span>
										</a>
									</li>
									<li>
										<a href="email-detail.html">
											<span class="sub-item">Email Detail</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="invoice.html">
								<i class="flaticon-file-1"></i>
								<p>Invoices</p>
								<span class="badge badge-count">6</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="pricing.html">
								<i class="flaticon-price-tag"></i>
								<p>Pricing</p>
								<span class="badge badge-count">6</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="faqs.html">
								<i class="flaticon-round"></i>
								<p>Faqs</p>
								<span class="badge badge-count">6</span>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#custompages">
								<i class="flaticon-placeholder"></i>
								<p>Custom Pages</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="custompages">
								<ul class="nav nav-collapse">
									<li>
										<a href="login.html">
											<span class="sub-item">Login</span>
										</a>
									</li>
									<li>
										<a href="userprofile.html">
											<span class="sub-item">User Profile</span>
										</a>
									</li>
									<li>
										<a href="404.html">
											<span class="sub-item">404</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="flaticon-mailbox"></i>
								<p>Menu Levels</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav1">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav1">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav2">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav2">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Level 1</span>
										</a>
									</li>
								</ul>
							</div>
						</li>-->
						<li>
							<footer class="sticky-footer mt-2" style="color:black">
							<hr>
								<div class="container my-auto">
								  <div class="copyright text-center my-auto">
									<span>Copyright &copy; CidadeSoft 2020</span>
								  </div>
								  <br>
								  
								  <div class="copyright text-center my-auto">
									<span>Developer: Alessandro Raymann
									  <a href="https://www.linkedin.com/in/alessandro-r-153114150/" target="blank">
										<i class='fab fa-linkedin' style="color:darkblue"></i>
									  </a>
									  <a class="ml-2" href="mailto:dev.aleraymann@gmail.com">
										<i class="flaticon-envelope-1" style="color:red"></i>
									  </a>
									</span>
								  </div>
								</div>
							  </footer>
					
						</li>
					</ul>
					
				</div>
				
			</div>
			
		</div>
		<!-- End Sidebar -->

		@yield('conteudo')
		
		@include('sweetalert::alert')
		<div class="quick-sidebar">
			<a href="#" class="close-quick-sidebar">
				<i class="flaticon-cross"></i>
			</a>
			<div class="quick-sidebar-wrapper">
				<ul class="nav nav-tabs nav-line nav-color-primary" role="tablist">
					<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#messages" role="tab" aria-selected="true">Messages</a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-selected="false">Tasks</a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
				</ul>
				<div class="tab-content mt-3">
					<div class="tab-chat tab-pane fade show active" id="messages" role="tabpanel">
						<div class="messages-contact">
							<div class="quick-wrapper">
								<div class="quick-scroll scrollbar-outer">
									<div class="quick-content contact-content">
										<span class="category-title mt-0">Recent</span>
										<div class="contact-list contact-list-recent">
											<div class="user">
												<a href="#">
													<div class="user-image">
														<img src="{{url("img/jm_denis.jpg")}}" alt="denis">
														<span class="status online"></span>
													</div>
													<div class="user-data">
														<span class="name">Jimmy Denis</span>
														<span class="message">How are you ?</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="user-image">
														<img src="{{url("img/chadengle.jpg")}}" alt="chad">
														<span class="status away"></span>
													</div>
													<div class="user-data">
														<span class="name">Chad</span>
														<span class="message">Ok, Thanks !</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="user-image">
														<img src="{{url("img/mlane.jpg")}}" alt="john doe">
														<span class="status offline"></span>
													</div>
													<div class="user-data">
														<span class="name">John Doe</span>
														<span class="message">Ready for the meeting today with...</span>
													</div>
												</a>
											</div>
										</div>
										<span class="category-title">Contacts</span>
										<div class="contact-list">
											<div class="user">
												<a href="#">
													<div class="user-image">
														<img src="{{url("img/jm_denis.jpg")}}" alt="denis">
														<span class="status"></span>
													</div>
													<div class="user-data2">
														<span class="name">Jimmy Denis</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="user-image">
														<img src="{{url("img/chadengle.jpg")}}" alt="chad">
														<span class="status away"></span>
													</div>
													<div class="user-data2">
														<span class="name">Chad</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="user-image">
														<img src="{{url("img/talha.jpg")}}" alt="talha">
														<span class="status offline"></span>
													</div>
													<div class="user-data2">
														<span class="name">Talha</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="messages-wrapper">
							<div class="messages-title">
								<div class="user">
									<img src="{{url("img/chadengle.jpg")}}" alt="chad">
									<span class="name">Chad</span>
									<span class="last-active">Active 2h ago</span>
								</div>
								<button class="return">
									<i class="flaticon-left-arrow-3"></i>
								</button>
							</div>
							<div class="messages-body messages-scroll scrollbar-outer">
								<div class="message-content-wrapper">
									<div class="message message-in">
										<div class="message-pic">
											<img src="{{url("img/chadengle.jpg")}}" alt="chad">
										</div>
										<div class="message-body">
											<div class="message-content">
												<div class="name">Chad</div>
												<div class="content">Hello, Rian</div>
											</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-out">
										<div class="message-body">
											<div class="message-content">
												<div class="content">
													Hello, Chad
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-in">
										<div class="message-pic">
											<img src="{{url("img/chadengle.jpg")}}" alt="chad">
										</div>
										<div class="message-body">
											<div class="message-content">
												<div class="name">Chad</div>
												<div class="content">
													When is the deadline of the project we are working on ?
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-out">
										<div class="message-body">
											<div class="message-content">
												<div class="content">
													The deadline is about 2 months away
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-in">
										<div class="message-pic">
											<img src="{{url("img/chadengle.jpg")}}" alt="chad">
										</div>
										<div class="message-body">
											<div class="message-content">
												<div class="name">Chad</div>
												<div class="content">
													Ok, Thanks !
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="messages-form">
								<div class="messages-form-control">
									<input type="text" placeholder="Type here" class="form-control input-pill input-solid message-input">
								</div>
								<div class="messages-form-tool">
									<a href="#" class="attachment">
										<i class="flaticon-file"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tasks" role="tabpanel">
						<div class="tasks-wrapper">
							<div class="tasks-scroll scrollbar-outer">
								<div class="tasks-content">
									<span class="category-title mt-0">Today</span>
									<ul class="tasks-list">
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Planning new project structure</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Add new Post</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Finalise the design proposal</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
									</ul>

									<span class="category-title">Tomorrow</span>
									<ul class="tasks-list">
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space!				</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
									</ul>

									<div class="mt-3">
										<div class="btn btn-primary btn-rounded btn-sm">
											<span class="btn-label">
												<i class="la la-plus"></i>
											</span>
											Add Task
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="settings" role="tabpanel">
						<div class="quick-wrapper settings-wrapper">
							<div class="quick-scroll scrollbar-outer">
								<div class="quick-content settings-content">

									<span class="category-title mt-0">General Settings</span>
									<ul class="settings-list">
										<li>
											<span class="item-label">Enable Notifications</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">Signin with social media</span>
											<div class="item-control">
												<input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">Backup storage</span>
											<div class="item-control">
												<input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">SMS Alert</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
									</ul>

									<span class="category-title mt-0">Notifications</span>
									<ul class="settings-list">
										<li>
											<span class="item-label">Email Notifications</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">New Comments</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">Chat Messages</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">Project Updates</span>
											<div class="item-control">
												<input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">New Tasks</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Topbar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="default"></button>
							<button type="button" class="changeTopBarColor" data-color="black"></button>
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeLogoHeaderColor" data-color="default"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="black"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSidebarColor" data-color="default"></button>
							<button type="button" class="changeSidebarColor" data-color="black"></button>
							<button type="button" class="changeSidebarColor" data-color="dark"></button>
							<button type="button" class="changeSidebarColor" data-color="blue"></button>
							<button type="button" class="changeSidebarColor" data-color="purple"></button>
							<button type="button" class="changeSidebarColor" data-color="light-blue"></button>
							<button type="button" class="changeSidebarColor" data-color="green"></button>
							<button type="button" class="changeSidebarColor" data-color="orange"></button>
							<button type="button" class="changeSidebarColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						</div>
					</div>
					<div class="switch-block">
						<div class="form-group d-flex p-0 align-items-center">
							<h4>Image Background</h4>
							<div class="ml-auto">
								<input id="custom-image-background" type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
							</div>
						</div>
					</div>
					<div class="switch-block mt-3">
						<h4>Pick Image:</h4>
						<div class="row images-pick m-0 mt-3 mb-5">
							<div class="col-4 col-md-3 img-pick active">
								<img src="{{url("img/sidebar-images/1.jpg")}}" alt="sidebar background">
							</div>
							<div class="col-4 col-md-3 img-pick">
								<img src="{{url("img/sidebar-images/2.jpg")}}" alt="sidebar background">
							</div>
							<div class="col-4 col-md-3 img-pick">
								<img src="{{url("img/sidebar-images/3.jpg")}}" alt="sidebar background">
							</div>
							<div class="col-4 col-md-3 img-pick">
								<img src="{{url("img/sidebar-images/4.jpg")}}" alt="sidebar background">
							</div>
							<div class="col-4 col-md-3 img-pick">
								<img src="{{url("img/sidebar-images/5.jpg")}}" alt="sidebar background">
							</div>
							<div class="col-4 col-md-3 img-pick">
								<img src="{{url("img/sidebar-images/6.jpg")}}" alt="sidebar background">
							</div>
							<div class="col-4 col-md-3 img-pick">
								<img src="{{url("img/sidebar-images/7.jpg")}}" alt="sidebar background">
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{url("js/core/jquery.3.2.1.min.js")}}"></script>
	<script src="{{url("js/core/popper.min.js")}}"></script>
	<script src="{{url("js/core/bootstrap.min.js")}}"></script>

	<!-- jQuery UI -->
	<script src="{{url("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js")}}"></script>
	<script src="{{url("js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js")}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{url("js/plugin/jquery-scrollbar/jquery.scrollbar.min.js")}}"></script>

	<!-- Moment JS -->
	<script src="{{url("js/plugin/moment/moment.min.js")}}"></script>

	<!-- Chart JS -->
	<script src="{{url("js/plugin/chart.js/chart.min.js")}}"></script>

	<!-- Chart Circle -->
	<script src="{{url("js/plugin/chart-circle/circles.min.js")}}"></script>

	<!-- Datatables -->
	<script src="{{url("js/plugin/datatables/datatables.min.js")}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{url("js/plugin/bootstrap-notify/bootstrap-notify.min.js")}}"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{url("/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js")}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{url("js/plugin/jqvmap/jquery.vmap.min.js")}}"></script>
	<script src="{{url("js/plugin/jqvmap/maps/jquery.vmap.world.js")}}"></script>

	<!-- Google Maps Plugin -->
	<script src="{{url("js/plugin/gmaps/gmaps.js")}}"></script>

	<!-- Dropzone -->
	<script src="{{url("js/plugin/dropzone/dropzone.min.js")}}"></script>

	<!-- Fullcalendar -->
	<script src="{{url("js/plugin/fullcalendar/fullcalendar.min.js")}}"></script>

	<!-- DateTimePicker -->
	<script src="{{url("js/plugin/datepicker/bootstrap-datetimepicker.min.js")}}"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="{{url("js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js")}}"></script>

	<!-- Bootstrap Wizard -->
	<script src="{{url("js/plugin/bootstrap-wizard/bootstrapwizard.js")}}"></script>

	<!-- jQuery Validation -->
	<script src="{{url("js/plugin/jquery.validate/jquery.validate.min.js")}}"></script>

	<!-- Summernote -->
	<script src="{{url("js/plugin/summernote/summernote-bs4.min.js")}}"></script>

	<!-- Select2 -->
	<script src="{{url("js/plugin/select2/select2.full.min.js")}}"></script>

	<!-- Sweet Alert -->
	<script src="{{url("js/plugin/sweetalert/sweetalert.min.js")}}"></script>

	<!-- Ready Pro JS -->
	<script src="{{url("js/ready.min.js")}}"></script>

	<!-- Ready Pro DEMO methods, don't include it in your project! -->
	<script src="{{url("js/setting-demo.js")}}"></script>
	<script src="{{url("js/demo.js")}}"></script>
	
</body>


</html>
