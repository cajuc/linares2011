@extends('layouts.base')

<!-- Sección de llamada a recursos '.css, etc' -->
@section('links')
	@parent
	{{ HTML::style('assets/css/style-categoria.css') }}
@stop

<!-- Sección que muestra el titulo -->
@section('title')
<title>Linares C.F - Categoría</title>
@stop

<!-- Sección que muestra el contenido principal -->
@section('content')
	<section class="container main-content">
		<div class="row">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="fa fa-users"><span>Plantilla</span></a></li>
						<li><a href="#section-2" class=""><span>Clasificación</span></a></li>
						<li><a href="#section-3" class=""><span>Calendario</span></a></li>
						<li><a href="#section-4" class=""><span>Resultados</span></a></li>
					</ul>
				</nav>

				<div class="content row">
					<section id="section-1">
						<div>
							<div class="hidden-xs col-sm-2 col-md-2"></div>
							<div class="col-xs-3 col-sm-2 col-md-2 portero text-center"><small>Portero</small></div>
							<div class="col-xs-3 col-sm-2 col-md-2 defensa text-center"><small>Defensa</small></div>
							<div class="col-xs-3 col-sm-2 col-md-2 centrocampo text-center"><small>Centro</small></div>
							<div class="col-xs-3 col-sm-2 col-md-2 delantero text-center"><small>Delantero</small></div>
							<div class="hidden-xs col-sm-2 col-md-2"></div>
						</div>
						
						<div class="clearfix"></div>

						<h2 class="text-center">Jugadores</h2>
						<div class="row">
							<div class="col-md-1"></div>
							
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle member-portero')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle member-defensa')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle member-centro')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle member-centro')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle member-delantero')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>

						<h2 class="text-center">Cuerpo Técnico</h2>
						<div class="row">
							<div class="col-md-1"></div>
							
							<div class="col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-md-2">
								<div class="member clearfix">
									<div>
										{{ HTML::image('assets/images/member/player.jpeg', 'player image', array('class' => 'img-responsive img-circle')) }}
									</div>
									<div class="text-center">
										Carlos Jurado
									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</section>
					<section id="section-2">
						
					</section>
					<section id="section-3">
						
					</section>
					<section id="section-4">
						
					</section>
				</div>
			</div>
		</div>
	</section>
@stop
