
		<div class="modal" id="md_formulario_persona">
			<h2>Usuario</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/persona', 'method' => 'POST', 'id' => 'fm_formulario_persona', 'class' => 'clss-fm-per')) }}
			{!! Field::hidden('Per_Codigo', '', []) !!}
			{!! Field::text('Per_Nombre', '', []) !!}
			{!! Field::text('Per_Apellido', '', []) !!}
			{!! Field::select('Tip_Codigo', [], []) !!}
			{!! Field::text('Per_Numerodoc', '', []) !!}
			{!! Field::text('Per_Direccion', '', []) !!}
			{!! Field::text('Per_Telmovil', '', []) !!}
			{!! Field::text('Per_Telfijo', '', []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-per-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-per-update">Update</button>
			<a class="btn btn-default clss-a-per" href="#" rel="modal:close">Close</a>
		</div>
