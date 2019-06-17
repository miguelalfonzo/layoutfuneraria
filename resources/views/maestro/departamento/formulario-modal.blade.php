
		<div class="modal" id="md_formulario_depar">
			<h2>Departamento</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/departamento', 'method' => 'POST', 'id' => 'fm_formulario_depar', 'class' => 'clss-fm-depar')) }}
			{!! Field::text('Dep_Codigo', '', []) !!}
			{!! Field::text('Dep_Descripcion', '', []) !!}
			{!! Field::select('Dep_Estado', [], []) !!}
			{!! Field::select('Pais_Codigo', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-depar-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-depar-update">Update</button>
			<a class="btn btn-default clss-a-depar" href="#" rel="modal:close">Close</a>
		</div>
