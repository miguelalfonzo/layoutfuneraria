/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.CatalogoBienes = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.CatalogoBienes.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-catabien-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-catabien-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/catalogo-bienes',
			data: values,
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	update: function() {
		var that = this;
		var Art_Codigo = $(that.element).find("input[name='Art_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/catalogo-bienes/'+Art_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Art_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/catalogo-bienes/'+Art_Codigo,
			data: {
				'_token': token
			},
			type: 'DELETE',
			dataType: 'json',
			success: function(response) {
				that.reloadDataTable();
			}
		});
	},
	getMany: function (nObjeto, data) {
		$.ajax({
			url: MY_API_URL+'/catalogo-bienes',
			data: data,
			type: 'GET',
			dataType: 'json',
			success: function(rows) {
				if(nObjeto.is("select")) {
					nObjeto.empty();
					nObjeto.append(
						'<option value="">Seleccione</option>'
					);
					$.each(rows, function( index, value ) {
						nObjeto.append(
							'<option value="'+value.Art_Codigo+'">'+
							value.Art_Descripcion+
							'</option>'
						);
					});
				}
			}
		});
	},
	getOne: function () {
		alert("getOne");
	},
	prepareUpdate: function(Art_Codigo) {
		$.ajax({
			url: MY_API_URL+'/catalogo-bienes/'+Art_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnCatalogoBienesModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-catabien");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Art_Codigo = values.Art_Codigo;
		finalValues.Art_Descripcion = values.Art_Descripcion;
		finalValues.Art_Precio_Ref = values.Art_Precio_Ref;
		finalValues.Centro_Gasto = values.Centro_Gasto;
		finalValues.Cuenta_Ingreso = values.Cuenta_Ingreso;
		finalValues.Cuenta_Gasto = values.Cuenta_Gasto;
		finalValues.Art_Estado = values.Art_Estado;
		finalValues.Unidad_Medida_UMed_Codigo = values.Unidad_Medida_UMed_Codigo;
		finalValues.Tipo_Bienes_TBien_Codigo = values.Tipo_Bienes_TBien_Codigo;
		finalValues.Grupo_Gru_Codigo = values.Grupo_Gru_Codigo;
		finalValues.Clase_Cla_Codigo = values.Clase_Cla_Codigo;
		finalValues.Familia_Fam_Codigo = values.Familia_Fam_Codigo;
		finalValues.Clasificador_Gasto = values.Clasificador_Gasto;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Art_Codigo = $(that.element).find("input[name='Art_Codigo']");
		Art_Codigo.val('');
		var Art_Descripcion = $(that.element).find("input[name='Art_Descripcion']");
		Art_Descripcion.val('');
		var Art_Precio_Ref = $(that.element).find("input[name='Art_Precio_Ref']");
		Art_Precio_Ref.val('');
		var Centro_Gasto = $(that.element).find("input[name='Centro_Gasto']");
		Centro_Gasto.val('');
		var Cuenta_Ingreso = $(that.element).find("input[name='Cuenta_Ingreso']");
		Cuenta_Ingreso.val('');
		var Cuenta_Gasto = $(that.element).find("input[name='Cuenta_Gasto']");
		Cuenta_Gasto.val('');
		var Art_Estado = $(that.element).find("select[name='Art_Estado']");
		Art_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
		var Unidad_Medida_UMed_Codigo = $(that.element).find("select[name='Unidad_Medida_UMed_Codigo']");
		$unidadMedida.getMany(Unidad_Medida_UMed_Codigo, null);
		var Tipo_Bienes_TBien_Codigo = $(that.element).find("select[name='Tipo_Bienes_TBien_Codigo']");
		$tipoBienes.getMany(Tipo_Bienes_TBien_Codigo, null);
		// ***
		var Grupo_Gru_Codigo = $(that.element).find("select[name='Grupo_Gru_Codigo']");
		$grupo.getMany(Grupo_Gru_Codigo, null);
		var Clase_Cla_Codigo = $(that.element).find("select[name='Clase_Cla_Codigo']");
		$clase.getMany(Clase_Cla_Codigo, null);
		var Familia_Fam_Codigo = $(that.element).find("select[name='Familia_Fam_Codigo']");
		$familia.getMany(Familia_Fam_Codigo, null);
		var Clasificador_Gasto = $(that.element).find("input[name='Clasificador_Gasto']");
		Clasificador_Gasto.val('');
	},
	setAll: function (catalogoBienes) {
		var that = this;
		var Art_Codigo = $(that.element).find("input[name='Art_Codigo']");
		Art_Codigo.val(catalogoBienes.Art_Codigo);
		var Art_Descripcion = $(that.element).find("input[name='Art_Descripcion']");
		Art_Descripcion.val(catalogoBienes.Art_Descripcion);
		var Art_Precio_Ref = $(that.element).find("input[name='Art_Precio_Ref']");
		Art_Precio_Ref.val(catalogoBienes.Art_Precio_Ref);
		var Centro_Gasto = $(that.element).find("input[name='Centro_Gasto']");
		Centro_Gasto.val(catalogoBienes.Centro_Gasto);
		var Cuenta_Ingreso = $(that.element).find("input[name='Cuenta_Ingreso']");
		Cuenta_Ingreso.val(catalogoBienes.Cuenta_Ingreso);
		var Cuenta_Gasto = $(that.element).find("input[name='Cuenta_Gasto']");
		Cuenta_Gasto.val(catalogoBienes.Cuenta_Gasto);
		var Art_Estado = $(that.element).find("select[name='Art_Estado']");
		Art_Estado.val(catalogoBienes.Art_Estado);
		var Unidad_Medida_UMed_Codigo = $(that.element).find("select[name='Unidad_Medida_UMed_Codigo']");
		Unidad_Medida_UMed_Codigo.val(catalogoBienes.Unidad_Medida_UMed_Codigo);
		var Tipo_Bienes_TBien_Codigo = $(that.element).find("select[name='Tipo_Bienes_TBien_Codigo']");
		Tipo_Bienes_TBien_Codigo.val(catalogoBienes.Tipo_Bienes_TBien_Codigo);
		var Grupo_Gru_Codigo = $(that.element).find("select[name='Grupo_Gru_Codigo']");
		Grupo_Gru_Codigo.val(catalogoBienes.Grupo_Gru_Codigo);
		var Clase_Cla_Codigo = $(that.element).find("select[name='Clase_Cla_Codigo']");
		Clase_Cla_Codigo.val(catalogoBienes.Clase_Cla_Codigo);
		var Familia_Fam_Codigo = $(that.element).find("select[name='Familia_Fam_Codigo']");
		Familia_Fam_Codigo.val(catalogoBienes.Familia_Fam_Codigo);
		var Clasificador_Gasto = $(that.element).find("input[name='Clasificador_Gasto']");
		Clasificador_Gasto.val(catalogoBienes.Clasificador_Gasto);
	},
	showModal: function (accion,catalogoBienes) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-catabien-save").show();
			$(that.element).children(".clss-btn-catabien-update").hide();
		}
		else if(accion == 2) {
			that.setAll(catalogoBienes);
			$(that.element).children(".clss-btn-catabien-save").hide();
			$(that.element).children(".clss-btn-catabien-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-catabien");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtCatalogoBienes) {
			$dtCatalogoBienes.DataTable().ajax.reload();
		}
	}
};
$.CatalogoBienes.defaultOptions = {
};

function fnCatalogoBienesDataTable(idTable) {
	$dtCatalogoBienes = $('#'+idTable);
	$dtCatalogoBienes.DataTable( {
		ajax: {
			url: MY_API_URL+'/catalogo-bienes',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Art_Descripcion' },
			{ data: 'Art_Precio_Ref' },
			{ data: 'Centro_Gasto' },
			{ data: 'Cuenta_Ingreso' },
			{ data: 'Cuenta_Gasto' },
			{ data: 'Art_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$catalogoBienes.prepareUpdate(\''+full.Art_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$catalogoBienes.delete(\''+full.Art_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnCatalogoBienesModalOpen(accion, catalogoBienes) {
	$catalogoBienes.showModal(accion, catalogoBienes);
}

var $dtCatalogoBienes = null;
var $catalogoBienes = null;

function fnCatalogoBienesInit() {
	$grupo = new $.Grupo(null);
	$clase = new $.Clase(null);
	$familia = new $.Familia(null);
	$tipoBienes = new $.TipoBienes(null);
	$unidadMedida = new $.UnidadMedida(null);
	$catalogoBienes = new $.CatalogoBienes($("#md_formulario_catabien"));
	$catalogoBienes.Init();
	fnCatalogoBienesDataTable('tb_tabla_catabien');
}
