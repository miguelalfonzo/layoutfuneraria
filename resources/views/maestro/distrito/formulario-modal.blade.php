
		<div class="modal" id="md_formulario_distrito">
			<h2>Distrito</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/distrito', 'method' => 'POST', 'id' => 'fm_formulario_distrito', 'class' => 'clss-fm-distrito')) }}
			{!! Field::text('Dist_Codigo', '', []) !!}
			{!! Field::text('Dist_Descripcion', '', []) !!}
			{!! Field::select('Dist_Estado', [], []) !!}
			{!! Field::select('Pais_Codigo', [], []) !!}
			{!! Field::select('Dep_Codigo', [], []) !!}
			{!! Field::select('Prov_Codigo', [], []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-distrito-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-distrito-update">Update</button>
			<a class="btn btn-default clss-a-distrito" href="#" rel="modal:close">Close</a>
		</div>
