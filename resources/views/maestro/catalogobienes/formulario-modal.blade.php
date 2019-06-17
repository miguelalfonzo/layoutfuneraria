
		<div class="modal" id="md_formulario_catabien">
			<h2>Catalogo Bienes</h2>
			<hr>
			{{ Form::open(array('url' => MY_API_URL.'/catalogo-bienes', 'method' => 'POST', 'id' => 'fm_formulario_catabien', 'class' => 'clss-fm-catabien')) }}
			{!! Field::hidden('Art_Codigo', '', []) !!}
			{!! Field::text('Art_Descripcion', '', []) !!}
			{!! Field::text('Art_Precio_Ref', '', []) !!}
			{!! Field::text('Centro_Gasto', '', []) !!}
			{!! Field::text('Cuenta_Ingreso', '', []) !!}
			{!! Field::text('Cuenta_Gasto', '', []) !!}
			{!! Field::select('Art_Estado', [], []) !!}
			{!! Field::select('Unidad_Medida_UMed_Codigo', [], []) !!}
			{!! Field::select('Tipo_Bienes_TBien_Codigo', [], []) !!}
			{!! Field::select('Grupo_Gru_Codigo', [], []) !!}
			{!! Field::select('Clase_Cla_Codigo', [], []) !!}
			{!! Field::select('Familia_Fam_Codigo', [], []) !!}
			{!! Field::text('Clasificador_Gasto', '', []) !!}
			{{ Form::close() }}
			<p></p>
			<hr>
			<button type="button" class="btn btn-primary clss-btn-catabien-save">Save</button>
			<button type="button" class="btn btn-primary clss-btn-catabien-update">Update</button>
			<a class="btn btn-default clss-a-catabien" href="#" rel="modal:close">Close</a>
		</div>
