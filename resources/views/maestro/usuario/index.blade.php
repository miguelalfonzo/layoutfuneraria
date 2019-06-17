@extends('layout')
@section('content')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Maestro - Usuario<small></small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<a href="{{ MY_APP_URL }}/home"><i class="fa fa-home"></i> Home</a>
						</li>
						<li class="active">Maestro - Usuario</li>
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs pull-right">
									<li>
										<a href="javascript:fnUsuModalOpen(1, null);" >Nuevo Usuario</a>
									</li>
									<li class="pull-left header"><i class="fa fa-atlas"></i> Tabla Usuarios</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" >
										<div class="row">
											<div class="col-sm-12 box-body table-responsive">
												<p></p>
												@include ('maestro/usuario/tabla')
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							@include ('maestro/usuario/formulario-modal')
						</div>
						<input type="hidden" name="my_token" id="my_token" value="{{ csrf_token() }}"/>
						<!--  -->
					</div>
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->

@endsection
