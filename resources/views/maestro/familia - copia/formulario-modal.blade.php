
		<div class="modal" id="md_formulario_familia">
			<h2>Familia</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/familia', 'method' => 'POST', 'id' => 'fm_formulario_familia', 'class' => 'clss-fm-familia')) }}
			{!! Field::text('Fam_Codigo', '', []) !!}
			{!! Field::text('Fam_Descripcion', '', []) !!}
			{!! Field::select('Fam_Estado', [], []) !!}
			{!! Field::select('Grupo_Gru_Codigo', [], []) !!}
			{!! Field::select('Clase_Cla_Codigo', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-familia-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-familia-update">Update</button>
			<a class="btn btn-default clss-a-familia" href="#" rel="modal:close">Close</a>
		</div>
