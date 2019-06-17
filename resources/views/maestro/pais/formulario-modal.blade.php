
		<div class="modal" id="md_formulario_pais">
			<h2>Pais</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/pais', 'method' => 'POST', 'id' => 'fm_formulario_pais', 'class' => 'clss-fm-pais')) }}
			{!! Field::text('Pais_Codigo', '', []) !!}
			{!! Field::text('Pais_Descripcion', '', []) !!}
			{!! Field::select('Pais_Estado', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-pais-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-pais-update">Update</button>
			<a class="btn btn-default clss-a-pais" href="#" rel="modal:close">Close</a>
		</div>
