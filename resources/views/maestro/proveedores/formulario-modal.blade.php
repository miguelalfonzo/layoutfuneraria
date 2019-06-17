
		<div class="modal" id="md_formulario_provee">
			<h2>Proveedores</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/proveedores', 'method' => 'POST', 'id' => 'fm_formulario_provee', 'class' => 'clss-fm-provee')) }}
			{!! Field::hidden('Prov_Codigo', '', []) !!}
			{!! Field::text('Prov_Fecha', '', []) !!}
			{!! Field::select('Prov_Tipo', [], []) !!}
			{!! Field::select('Prov_Ruc', [], []) !!}
			{!! Field::select('Prov_Razon_Social', [], []) !!}
			{!! Field::select('Prov_Direccion', [], []) !!}
			{!! Field::select('Prov_TeleFijo', [], []) !!}
			{!! Field::select('Prov_Celular', [], []) !!}
			{!! Field::select('Prov_Email', [], []) !!}
			{!! Field::select('Prov_Estado', [], []) !!}
			{!! Field::select('Pais_Codigo', [], []) !!}
			{!! Field::select('Dep_Codigo', [], []) !!}
			{!! Field::select('Provi_Codigo', [], []) !!}
			{!! Field::select('Dist_Codigo', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-provee-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-provee-update">Update</button>
			<a class="btn btn-default clss-a-provee" href="#" rel="modal:close">Close</a>
		</div>
