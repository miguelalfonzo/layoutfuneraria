@extends('layout')
@section('content')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- ****--**** -->
				<!-- <div class="row">
				<div class="w-25 p-3" style="background-color: #eee;">Width 25%</div>
				<div class="w-50 p-3" style="background-color: #eee;">Width 50%</div>
				<div class="w-75 p-3" style="background-color: #eee;">Width 75%</div>
				<div class="w-100 p-3" style="background-color: #eee;">Width 100%</div>
				</div> -->
				<section class="content-header">
					
					<h1>
						Maestro - Clientes<small></small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<a href="{{ MY_APP_URL }}/home"><i class="fa fa-home"></i> Home</a>
						</li>
						<li class="active">Maestro - Clientes</li>
					</ol>
					
				</section>
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom" id="dvtabla">
								<ul class="nav nav-tabs pull-right">
									<!-- <li>
										<a href="javascript:fnClientesModalOpen(1, null);" >Nueva Clientes</a>
									</li> -->
									<li class="pull-left header"><i class="fa fa-atlas"></i> Tabla Clientes</li>
								</ul>
								<div class="tab-content">
									<!-- <div class="tab-pane active" >
										<div class="row">
											<div class="col-sm-12 box-body table-responsive">
												<p></p>
												@ include ('maestro/clientes/tabla')
											</div>
										</div>
									</div>
									-->
									<div class="row">
										<div class="col-sm-12 table-responsive">
										@include ('maestro/clientes/tabla')
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="nav-tabs-custom" id="dvformulario" style="display:none;">
							<!-- @ include ('maestro/clientes/formulario-modal') -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs pull-right">
									<!-- <li>
										<a href="javascript:fnClientesModalOpen(1, null);" >Nueva Clientes</a>
									</li> -->
									<li class="pull-left header"><i class="fa fa-atlas"></i> Formulario Clientes</li>
								</ul>
								<div class="tab-content">
									<!-- <div class="tab-pane active" >
										<div class="row">
											<div class="col-sm-12 box-body table-responsive">
												<p></p>
												@ include ('maestro/clientes/tabla')
											</div>
										</div>
									</div>
									-->
									<div class="row">
										<div class="col-sm-12 table-responsive">
										@include ('maestro/clientes/formulario-modal')
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="my_token" id="my_token" value="{{ csrf_token() }}"/>
						<!--  -->
					</div>
				</section>
				<!--  -->
			</div><!-- /.content-wrapper -->

@endsection
