
		<div class="modal" id="md_formulario_rol">
			<h2>Rol</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/rol', 'method' => 'POST', 'id' => 'fm_formulario_rol', 'class' => 'clss-fm-rol')) }}
			{!! Field::hidden('Rol_Codigo', '', []) !!}
			{!! Field::text('Rol_Nombre', '', []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-rol-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-rol-update">Update</button>
			<a class="btn btn-default clss-a-rol" href="#" rel="modal:close">Close</a>
		</div>
