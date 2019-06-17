<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>
		<!-- <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.8.1.min.css"> -->

		<!-- jquery-ui.min.css?v=31 -->
		<link rel="stylesheet" href="{{ url('/plugins/jquery-ui/jquery-ui.min.css') }}">
		<!-- bootstrap.min.css?v=31 -->
		<link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
		<!-- AdminLTE.min.css?v=31 -->
		<link rel="stylesheet" href="{{ url('/AdminLTE/css/AdminLTE.min.css') }}">
		<!-- _all-skins.min.css?v=31 -->
		<link rel="stylesheet" href="{{ url('/AdminLTE/css/skins/_all-skins.min.css') }}">

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<!-- /* https://fonts.googleapis.com/css?family=Tangerine */ -->
		<!-- <style>
		@ import 'https://fonts.googleapis.com/css?family=Tangerine';
		</style> -->
		<!-- <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine"> -->
		  
		<!-- <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.8.1.min.css"> -->
		<style></style>
		<!-- <style type="text/css">
		/* Chart.js */
		@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
		</style> -->

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script> -->
		<link href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css" rel="stylesheet">
		<script>var MY_API_URL = "{{ MY_API_URL }}";</script>
		<script>var MY_APP_URL = "{{ MY_APP_URL }}";</script>
    </head>
    <body class="skin-green sidebar-mini pace-done pace-done sidebar-collapse" style="height: auto;">
		<div class="pace  pace-inactive pace-inactive">
			<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
				<div class="pace-progress-inner"></div>
			</div>
			<div class="pace-activity"></div>
		</div>
		<div class="wrapper" style="height: auto;">
			<!-- Main Header -->
			<header class="main-header no-print">
				<a href="#" class="logo">
					<span class="logo-lg">FUNERARIA</span>
				</a>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" id="xxsi" class="xxx" data-toggle="offcanvas" role="button">
						<!-- <span class="sr-only">Toggle navigation</span>fa fa-bars change-->
						<span class="sr-only">Toggle navigation</span>
						<span class="fa fa-bars">DESGLOSA</span>
					</a>
					
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<div class="m-8 pull-left mt-15 hidden-xs" style="color: #fff;">
							<strong><span class="sp-clss-hoy-aaaa-mm-dd"><?= "fecha-actual" ?></span></strong>
						</div>
						<ul class="nav navbar-nav">
							<!-- DATOS DE LA EMPRESA -->
							<li class="dropdown notifications-menu">
								<!-- Menu toggle button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-info-circle"></i>
									<span class="label label-info num_noti">!</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">
										<!-- <img src="<?= "url" ?>../icono.png" class="img-circle" alt="User Image"> -->
										<span>Software | Funeraria</span>
									</li>
									<li>
										<!-- inner menu: contains the messages -->
										<ul class="menu">
											<li><!-- start message -->
												<div style="padding: 20px;">
													<label>Correo: </label>correo@correo.com
													<br>
													<label>Direccion: </label>Peru, Lima-Lima.
													<br>
													<label>Cel: </label>000-000-000
													<hr>
													<a href="#">Blank</a>
												</div>
											</li><!-- end message -->
										</ul><!-- /.menu -->
									</li>
								</ul>
							</li>
							
							<!-- User Account Menu -->
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- <img src="<?= "url" ?>../<?= "imagen" ?>" style="height: 40px;" class="img-circle" alt="User Image"> -->
									<span>
										Usuario: <?= "NOMBRE" ?>
									</span>
								</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header">
										<!-- <img src="<?= "url" ?>../<?= "Imagen" ?>" class="img-circle" alt="User Image"> -->
										<p><?= "Nombre" ?></p>
									</li>
									<!-- Menu Body -->
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="#!" class="btn btn-info btn-block clss_a_show_perfil"><i class="fa fa-user"></i> Perfil</a>
										</div>
										<div class="pull-right">
											<a href="<?= "url" ?>login/logout" class="btn btn-danger btn-block btn-exit-system"><i class="fa fa-power-off"></i> Logout</a>
										</div>
									</li>
								</ul>
							</li>
							<!-- Control Sidebar Toggle Button -->
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<br>
				<section class="sidebar">
					<!-- Sidebar user panel (optional) -->

					<!-- Sidebar Menu -->
					<ul class="sidebar-menu">
						<!-- Call superadmin module if defined -->
						<!-- call Essentials module if defined -->
						<!-- <li class="header">HEADER</li> -->
						<li class="">
							<a href="{{ MY_APP_URL }}/home">
								<i class="fa fa-home"></i>
								<span>Home</span>
							</a>
						</li>
						<?php
						$treeview_menu = "";
						$pri_grupo_aux = "";
						foreach ($privilegios as $valor) {
							$style = '';
							$html_li = '';
							if($pri_grupo == $valor->pri_grupo && $pri_nombre == $valor->pri_nombre) {
								$style = 'style="color: #fff;"';
								$html_li = '<i class="fa fa-circle pull-right"></i>';
							}
							
							if($pri_grupo_aux != $valor->pri_grupo) {
								if($pri_grupo_aux != '') {
									$treeview_menu = $treeview_menu.'</ul></li>';
								}
								$pri_grupo_aux = $valor->pri_grupo;
								$active = "";
								if($pri_grupo == $valor->pri_grupo) {
									$active = "active";
								}
								$treeview_menu = $treeview_menu.'<li class="treeview '.$active.'">
							<a href="#">
								<i class="fa fa-'.$valor->pri_ico_grupo.'"></i>
								<span>'.$valor->pri_grupo.'</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="'.base_url().$valor->pri_acceso.'" '.$style.'><i class="fa fa-'.$valor->pri_ico.'"></i> '.$valor->pri_nombre.$html_li.'</a>
								</li>';
							}
							else {
								$treeview_menu = $treeview_menu.'
								<li>
									<a href="'.base_url().$valor->pri_acceso.'" '.$style.'><i class="fa fa-'.$valor->pri_ico.'"></i> '.$valor->pri_nombre.$html_li.'</a>
								</li>';
							}
						}
						if($treeview_menu != '') {
							$treeview_menu = $treeview_menu.'</ul></li>';
						}
						echo $treeview_menu;
						?>
						<!-- ¿<!> -->
						<li class="treeview ">
							<a href="#">
								<i class="fa fa-"></i>
								<span>Maestro</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu active">
								<li>
									<a href="{{ MY_APP_URL }}/maestro/catalogo-bienes" style="color: #fff;"><i class="fa fa-"></i> Catalogo Bienes<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/clase" style="color: #fff;"><i class="fa fa-"></i> Clase<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/clientes" style="color: #fff;"><i class="fa fa-"></i> Clientes<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/departamento" style="color: #fff;"><i class="fa fa-"></i> Departamento<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/distrito" style="color: #fff;"><i class="fa fa-"></i> Distrito<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/familia" style="color: #fff;"><i class="fa fa-"></i> Familia<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/grupo" style="color: #fff;"><i class="fa fa-"></i> Grupo<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/pais" style="color: #fff;"><i class="fa fa-"></i> Pais<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/persona" style="color: #fff;"><i class="fa fa-"></i> Persona<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/proveedores" style="color: #fff;"><i class="fa fa-"></i> Proveedores<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/provincia" style="color: #fff;"><i class="fa fa-"></i> Provincia<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/rol" style="color: #fff;"><i class="fa fa-"></i> Rol<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/tipo-bienes" style="color: #fff;"><i class="fa fa-"></i> Tipo Bienes<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/tipo-documento" style="color: #fff;"><i class="fa fa-"></i> Tipo Documento<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/unidad-medida" style="color: #fff;"><i class="fa fa-"></i> Unidad Medida<i class="fa fa-circle pull-right"></i></a>
								</li>
								<li>
									<a href="{{ MY_APP_URL }}/maestro/usuario" style="color: #fff;"><i class="fa fa-"></i> Usuario<i class="fa fa-circle pull-right"></i></a>
								</li>
								
								<li>
									<a href="{{ MY_APP_URL }}/maestro/perfiles" style="color: #fff;"><i class="fa fa-"></i> Perfil<i class="fa fa-circle pull-right"></i></a>
								</li>
							</ul>
						</li>
						<!-- <!>? -->
					</ul>
					<!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>
			