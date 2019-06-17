
		<div class="modal" id="md_formulario_usuario">
			<h2>Usuario</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/usuario', 'method' => 'PUT', 'id' => 'fm_formulario_usuario', 'class' => 'clss-fm-usu')) }}
			{!! Field::hidden('Usu_Codigo', '', []) !!}
			{!! Field::select('Tip_Codigo', [], []) !!}
			{!! Field::text('Per_Numerodoc', '', []) !!}
			{!! Field::text('Usu_Nombre', '', []) !!}
			<div id="field_Usu_Clave" class="form-group">
			<label for="Usu_Clave">Usu Clave</label>
			{!! Form::password('Usu_Clave', ['class' => 'form-control']) !!}
			</div>
			{!! Field::select('Rol_Codigo', [], []) !!}
			{!! Field::select('Usu_Estado', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-usu-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-usu-update">Update</button>
			<a class="btn btn-default clss-a-usu" href="#" rel="modal:close">Close</a>
		</div>
