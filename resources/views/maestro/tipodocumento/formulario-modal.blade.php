
		<div class="modal" id="md_formulario_tipodocum">
			<h2>Tipo Documento</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/tipo-documento', 'method' => 'POST', 'id' => 'fm_formulario_tipodocum', 'class' => 'clss-fm-tipodocum')) }}
			{!! Field::hidden('Tdoc_Codigo', '', []) !!}
			{!! Field::text('Tdoc_Descripcion', '', []) !!}
			{!! Field::select('Tdoc_Estado', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-tipodocum-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-tipodocum-update">Update</button>
			<a class="btn btn-default clss-a-tipodocum" href="#" rel="modal:close">Close</a>
		</div>
