
		<div id="md_formulario_clientes"><!-- class="modal" -->
			<h2>Clientes</h2>
			<hr>
			<div class="row">
			{{ Form::open(array('url' => MY_API_URL.'/clientes', 'method' => 'POST', 'id' => 'fm_formulario_clientes', 'class' => 'clss-fm-clientes')) }}
			{!! Field::hidden('Cli_Codigo', '', []) !!}
			<div class="col-md-3 mb-4">
			{!! Field::select('Cli_Tipo_Persona', '', []) !!}
			{!! Field::text('Cli_Direccion', [], []) !!}
			{!! Field::text('Cli_Email', [], []) !!}
			</div>
			<div class="col-md-3 mb-4">
			{!! Field::text('Cli_Telefono', [], []) !!}
			{!! Field::select('Cli_Estado', '', []) !!}
			{!! Field::select('Tdoc_Codigo', '', []) !!}
			</div>
			<div class="col-md-3 mb-4">
			{!! Field::text('Cli_Nro_Docu', [], []) !!}
			{!! Field::select('Pais_Codigo', '', []) !!}
			{!! Field::select('Dep_Codigo', '', []) !!}
			</div>
			<div class="col-md-3 mb-4">
			{!! Field::select('Prov_Codigo', '', []) !!}
			{!! Field::select('Dist_Codigo', '', []) !!}
			</div>
			{{ Form::close() }}
			</div>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-clientes-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-clientes-update">Update</button>
			<a class="btn btn-default clss-a-clientes" href="#" rel="modal:close">Close</a>
		</div>
