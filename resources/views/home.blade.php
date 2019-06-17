@include ('head')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Home - Bienvenido<small></small>
					</h1>
					<ol class="breadcrumb">
						<li class="active">Home</li>
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs pull-right">
									<li class="pull-left header"><i class="fa fa-atlas"></i> Bienvenido: {{ $userName }}</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" >
										<div class="row">
											<h1>Bienvenido</h1>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->

@include ('foot')
