
		<!-- <table class="table table-bordered table-hover" id="tb_tabla_clientes">
			<thead>
				<tr>
					<th>T.PERSONA</th>
					<th>T.DOCUMENTO</th>
					<th>NRO.DOCUMENTO</th>
					<th>ESTADO</th>
					<th>ACCION</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table> -->
		
		<!--  --><!-- <div class="row">
    < !-- Grid column -- >
    <div class="col">
      < !-- Material input -- >
      <div class="md-form mt-0">
        <input type="text" class="form-control" placeholder="First name">
      </div>
    </div>
    < !-- Grid column -- >

    < !-- Grid column -- >
    <div class="col">
      < !-- Material input -- >
      <div class="md-form mt-0">
        <input type="text" class="form-control" placeholder="Last name">
      </div>
    </div>
    < !-- Grid column -- >
  </div> --><!--  -->
		<div class="row">
			<form>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<!-- <label for="validationServer01">First name</label> -->
						<input type="text" class="form-control is-valid" id="validationServer01" placeholder="ingrese descripcion" value="" required>
						<div class="valid-feedback">Descripcion</div>
					</div>
					<div class="col-md-4 mb-3">
						<input type="text" class="form-control is-valid" id="validationServer02" placeholder="ingrese nro documento" value="" required>
						<div class="valid-feedback">Nro. Documento</div>
					</div>
					<div class="col-md-4 mb-3">
						<!-- <input type="text" class="form-control is-valid" id="validationServer02" placeholder="ingrese nro documento" value="" required>
						<div class="valid-feedback">Nro. Documento</div> -->
						<button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
						<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
						<button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
					</div>
				</div>
			</form>
			<!-- <input > -->
		</div>
		<table
			id="table"
			data-toolbar="#toolbar"
			data-detail-formatter="detailFormatter"
			data-minimum-count-columns="2"
			data-id-field="id"
			data-page-list="[10, 25, 50, 100, ALL]"
			data-show-footer="true"
			data-side-pagination="server"
			data-url="{{ MY_API_URL }}/clientes"
			data-response-handler="responseHandler">
		</table>
		<p></p>
		<div class="row">
			<form>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<input type="text" class="form-control is-valid" id="validationServer01" placeholder="ingrese telefono" value="" required>
						<div class="valid-feedback">Telefono</div>
					</div>
				</div>
			</form>
			<!-- <input > -->
		</div>
