
		<div class="modal" id="md_formulario_tipbien">
			<h2>Tipo Bien</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/tipo-bienes', 'method' => 'POST', 'id' => 'fm_formulario_tipbien', 'class' => 'clss-fm-tipbien')) }}
			{!! Field::hidden('TBien_Codigo', '', []) !!}
			{!! Field::text('TBien_Descripcion', '', []) !!}
			{!! Field::select('TBien_Estado', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-tipbien-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-tipbien-update">Update</button>
			<a class="btn btn-default clss-a-tipbien" href="#" rel="modal:close">Close</a>
		</div>
