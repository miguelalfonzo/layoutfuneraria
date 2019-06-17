/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.UnidadMedida = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.UnidadMedida.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-unimed-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-unimed-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/unidad-medida',
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
		var UMed_Codigo = $(that.element).find("input[name='UMed_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/unidad-medida/'+UMed_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(UMed_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/unidad-medida/'+UMed_Codigo,
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
			url: MY_API_URL+'/unidad-medida',
			data: "",
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
							'<option value="'+value.UMed_Codigo+'">'+
							value.UMed_Descripcion+
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
	prepareUpdate: function(UMed_Codigo) {
		$.ajax({
			url: MY_API_URL+'/unidad-medida/'+UMed_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnUnidadMedidaModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-unimed");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.UMed_Codigo = values.UMed_Codigo;
		finalValues.UMed_Descripcion = values.UMed_Descripcion;
		finalValues.UMed_Estado = values.UMed_Estado;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var UMed_Codigo = $(that.element).find("input[name='UMed_Codigo']");
		UMed_Codigo.val('');
		var UMed_Descripcion = $(that.element).find("input[name='UMed_Descripcion']");
		UMed_Descripcion.val('');
		var UMed_Estado = $(that.element).find("select[name='UMed_Estado']");
		UMed_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
	},
	setAll: function (unidadmedida) {
		var that = this;
		var UMed_Codigo = $(that.element).find("input[name='UMed_Codigo']");
		UMed_Codigo.val(unidadmedida.UMed_Codigo);
		var UMed_Descripcion = $(that.element).find("input[name='UMed_Descripcion']");
		UMed_Descripcion.val(unidadmedida.UMed_Descripcion);
		var UMed_Estado = $(that.element).find("select[name='UMed_Estado']");
		UMed_Estado.val(unidadmedida.UMed_Estado);
	},
	showModal: function (accion,unidadmedida) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-unimed-save").show();
			$(that.element).children(".clss-btn-unimed-update").hide();
		}
		else if(accion == 2) {
			that.setAll(unidadmedida);
			$(that.element).children(".clss-btn-unimed-save").hide();
			$(that.element).children(".clss-btn-unimed-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-unimed");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtUnidadMedida) {
			$dtUnidadMedida.DataTable().ajax.reload();
		}
	}
};
$.UnidadMedida.defaultOptions = {
};

function fnUnidadMedidaDataTable(idTable) {
	$dtUnidadMedida = $('#'+idTable);
	$dtUnidadMedida.DataTable( {
		ajax: {
			url: MY_API_URL+'/unidad-medida',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'UMed_Descripcion' },
			{ data: 'UMed_Estado' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$unidadMedida.prepareUpdate('+full.UMed_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$unidadMedida.delete('+full.UMed_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnUnidadMedidaModalOpen(accion, unidadmedida) {
	$unidadMedida.showModal(accion, unidadmedida);
}

var $dtUnidadMedida = null;
var $unidadMedida = null;

function fnUnidadMedidaInit() {
	$unidadMedida = new $.UnidadMedida($("#md_formulario_unimed"));
	$unidadMedida.Init();
	fnUnidadMedidaDataTable('tb_tabla_unimeds');
}
