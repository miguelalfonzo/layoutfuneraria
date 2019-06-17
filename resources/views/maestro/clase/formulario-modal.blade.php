
		<div class="modal" id="md_formulario_clase">
			<h2>Clase</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/clase', 'method' => 'POST', 'id' => 'fm_formulario_clase', 'class' => 'clss-fm-clase')) }}
			{!! Field::text('Cla_Codigo', '', []) !!}
			{!! Field::text('Cla_Descripcion', '', []) !!}
			{!! Field::select('Cla_Estado', [], []) !!}
			{!! Field::select('Grupo_Gru_Codigo', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-clase-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-clase-update">Update</button>
			<a class="btn btn-default clss-a-clase" href="#" rel="modal:close">Close</a>
		</div>
