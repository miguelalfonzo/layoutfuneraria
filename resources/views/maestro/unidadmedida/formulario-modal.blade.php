
		<div class="modal" id="md_formulario_unimed">
			<h2>Unidad Medida</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/unidad-medida', 'method' => 'POST', 'id' => 'fm_formulario_unimed', 'class' => 'clss-fm-unimed')) }}
			{!! Field::hidden('UMed_Codigo', '', []) !!}
			{!! Field::text('UMed_Descripcion', '', []) !!}
			{!! Field::select('UMed_Estado', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-unimed-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-unimed-update">Update</button>
			<a class="btn btn-default clss-a-unimed" href="#" rel="modal:close">Close</a>
		</div>
