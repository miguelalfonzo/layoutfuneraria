
		<div class="modal" id="md_formulario_grupo">
			<h2>Grupo</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/grupo', 'method' => 'POST', 'id' => 'fm_formulario_grupo', 'class' => 'clss-fm-grupo')) }}
			{!! Field::text('Gru_Codigo', '', []) !!}
			{!! Field::text('Gru_Descripcion', '', []) !!}
			{!! Field::select('Gru_Estado', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-grupo-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-grupo-update">Update</button>
			<a class="btn btn-default clss-a-grupo" href="#" rel="modal:close">Close</a>
		</div>
