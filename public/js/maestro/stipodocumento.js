/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.TipoDocumento = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.TipoDocumento.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-tipodocum-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-tipodocum-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/tipo-documento',
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
		var Tdoc_Codigo = $(that.element).find("input[name='Tdoc_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/tipo-documento/'+Tdoc_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Tdoc_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/tipo-documento/'+Tdoc_Codigo,
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
			url: MY_API_URL+'/tipo-documento',
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
							'<option value="'+value.Tdoc_Codigo+'">'+
							value.Tdoc_Descripcion+
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
	loadComboBox: function (nObjeto, data) {
		$.ajax({
			url: MY_API_URL+'/tipo-documento',
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(rows) {
					nObjeto.empty();
					nObjeto.append(
						'<option value="">Seleccione</option>'
					);
					$.each(rows, function( index, value ) {
						nObjeto.append(
							'<option value="'+value.Tdoc_Codigo+'">'+
							value.Tdoc_Descripcion+
							'</option>'
						);
					});
				
			}
		});
	},
	prepareUpdate: function(Tdoc_Codigo) {
		$.ajax({
			url: MY_API_URL+'/tipo-documento/'+Tdoc_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnTipoDocumentoModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-tipodocum");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Tdoc_Codigo = values.Tdoc_Codigo;
		finalValues.Tdoc_Descripcion = values.Tdoc_Descripcion;
		finalValues.Tdoc_Estado = values.Tdoc_Estado;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Tdoc_Codigo = $(that.element).find("input[name='Tdoc_Codigo']");
		Tdoc_Codigo.val('');
		var Tdoc_Descripcion = $(that.element).find("input[name='Tdoc_Descripcion']");
		Tdoc_Descripcion.val('');
		var Tdoc_Estado = $(that.element).find("select[name='Tdoc_Estado']");
		Tdoc_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Inactivo</option>'
		);
	},
	setAll: function (tipoDocumento) {
		var that = this;
		var Tdoc_Codigo = $(that.element).find("input[name='Tdoc_Codigo']");
		Tdoc_Codigo.val(tipoDocumento.Tdoc_Codigo);
		var Tdoc_Descripcion = $(that.element).find("input[name='Tdoc_Descripcion']");
		Tdoc_Descripcion.val(tipoDocumento.Tdoc_Descripcion);
		var Tdoc_Estado = $(that.element).find("select[name='Tdoc_Estado']");
		Tdoc_Estado.val(tipoDocumento.Tdoc_Estado);
	},
	showModal: function (accion,tipoDocumento) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-tipodocum-save").show();
			$(that.element).children(".clss-btn-tipodocum-update").hide();
		}
		else if(accion == 2) {
			that.setAll(tipoDocumento);
			$(that.element).children(".clss-btn-tipodocum-save").hide();
			$(that.element).children(".clss-btn-tipodocum-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-tipodocum");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtTipoDocumento) {
			$dtTipoDocumento.DataTable().ajax.reload();
		}
	}
};
$.TipoDocumento.defaultOptions = {
};

function fnTipoDocumentoDataTable(idTable) {
	$dtTipoDocumento = $('#'+idTable);
	$dtTipoDocumento.DataTable( {
		ajax: {
			url: MY_API_URL+'/tipo-documento',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Tdoc_Descripcion' },
			{ data: 'Tdoc_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$tipoDocumento.prepareUpdate(\''+full.Tdoc_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$tipoDocumento.delete(\''+full.Tdoc_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnTipoDocumentoModalOpen(accion, tipoDocumento) {
	$tipoDocumento.showModal(accion, tipoDocumento);
}

var $dtTipoDocumento = null;
var $tipoDocumento = null;

function fnTipoDocumentoInit() {
	$tipoDocumento = new $.TipoDocumento($("#md_formulario_tipodocum"));
	$tipoDocumento.Init();
	fnTipoDocumentoDataTable('tb_tabla_tipodocum');
}
