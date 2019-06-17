<!DOCTYPE html>
<html>
    <title>Sistema de Funeraria</title>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<!-- <link rel="icon" type="image/png" href="< ?= base_url() ? >../imagen/gvm.ico" /> -->
		<!-- <link rel="stylesheet" href="< ?= base_url() ? >../js/bootstrap.min.css"> -->
		<!-- <script src="< ?= base_url() ? >../js/jquery.min.js"></script> -->
		<!-- <script src="< ?= base_url() ? >../js/bootstrap.min.js"></script> -->
		<style>
			form {
				max-width: 360px;
				border: 2px solid #dedede;
				padding: 38px;
				margin-top: 85px;
				border-radius: 25px;
				background-color: white;
				/* background: #fff; */
			}
			body {
				background-color: #c5d0da;
			}
		</style>
	</head>
	<body>
		<center>
			<form class="form-signin" action="{{ url('/api/login/login') }}" method="POST">
				<h1 class="h3 mb-3 font-weight-normal">SISTEMA FUNERARIA</h1>
				<hr>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" id="usu_nombre" name="usu_nombre" class="form-control" placeholder="ingrese usuario" required >
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" id="usu_clave" name="usu_clave" class="form-control" placeholder="ingrese clave" required >
					</div>
				</div>
				<hr>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				<a>
					<br>Copyright © 2019 Derechos reservados
					Peru Lima | ...</a>
				</a>
			</form>
			<!-- { { FORM::open(['route' => 'api.login.login', 'method' => 'POST']) }}
<button type="submit">Enviar Formulario</button>
{ { FORM::close() }} -->
{{ Form::open(array('url' => 'api/login/login', 'method' => 'POST')) }}
{!! Field::text('name', 'value', []) !!}
<!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> -->
{!! Form::button('Delete account', [
        'onClick' => "parent.location='" . url('delete/1') . "'",
        'formtarget' => 'fromtarget'
    ]) 
!!}
{{ Form::close() }}
<!-- { !! Form::text('name', 'value', $attributes) !!} -->
		</center>
	</body>
</html>
