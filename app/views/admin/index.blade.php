<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Administración</title>
		{{ HTML::style("assets/css/bootstrap.min.css") }}
		{{ HTML::style("assets/css/font-awesome.min.css") }}
		{{ HTML::style("assets/css/style-admin.css") }}
		{{ HTML::style("assets/css/normalize.css") }}
		{{ HTML::style("assets/css/fonts.css") }}
	</head>
	<body>
		<div class="contenedor-principal">
			<header>
				<div class="page-header cabecera">
					<h1>Administración del sitio</h1>
				</div>
			</header>

			@if (Session::has('error'))
				<div class="alert alert-danger message-error" role="alert">
					<span> {{ Session::get('error') }} </span>
				</div>
			@endif

			<div class="contenedor-login">
				<section>
					<div class="login-header">
						<span>Login</span>
					</div>
				</section>
				<section>
					<div class="login-body">

						@if (Session::has('invalid'))
							<div class="alert alert-danger"> {{ Session::get('invalid') }} </div>
						@endif

						{{ Form::open(array('url' => 'admin', 'role' => 'form')) }}
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-user fa-lg"></i>
								</span>
								{{ Form::text('username', '', array('placeholder' => 'Usuario', 'class' => 'form-control', 'autofocus')) }}
								<!-- <input type="text" class="form-control" name="username" placeholder="Usuario" autofocus> -->
							</div>
						
							{{ $errors->first('username', '<div class="alert-danger">:message</div>') }}

							<br>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-lock fa-lg"></i>
								</span>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>

							{{ $errors->first('password', '<div class="alert-danger">:message</div>') }}


							<br>
							<button name="entrar" class="btn btn-primary btn-md fa fa-unlock-alt fa-lg"> Entrar</button>
						{{ Form::close()}}
					</div>
				</section>
			</div>
		</div>

		<footer class="container">
			<div class="pie-pagina">
				<i class="fa fa-copyright"></i> 2014. Todos los derechos reservados.
			</div>
		</footer>
	</div>
</body>
</html>