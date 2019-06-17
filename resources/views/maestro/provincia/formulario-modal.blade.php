
		<div class="modal" id="md_formulario_provi">
			<h2>Provincia</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/provincia', 'method' => 'POST', 'id' => 'fm_formulario_provi', 'class' => 'clss-fm-provi')) }}
			{!! Field::text('Prov_Codigo', '', []) !!}
			{!! Field::text('Prov_Descripcion', '', []) !!}
			{!! Field::select('Prov_Estado', [], []) !!}
			{!! Field::select('Dep_Codigo', [], []) !!}
			{!! Field::select('Pais_Codigo', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-provi-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-provi-update">Update</button>
			<a class="btn btn-default clss-a-provi" href="#" rel="modal:close">Close</a>
		</div>
