/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.TipoBienes = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.TipoBienes.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-tipbien-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-tipbien-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/tipo-bienes',
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
		var TBien_Codigo = $(that.element).find("input[name='TBien_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/tipo-bienes/'+TBien_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(TBien_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/tipo-bienes/'+TBien_Codigo,
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
			url: MY_API_URL+'/tipo-bienes',
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
							'<option value="'+value.TBien_Codigo+'">'+
							value.TBien_Descripcion+
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
	prepareUpdate: function(TBien_Codigo) {
		$.ajax({
			url: MY_API_URL+'/tipo-bienes/'+TBien_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnTipoBienesModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-tipbien");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.TBien_Codigo = values.TBien_Codigo;
		finalValues.TBien_Descripcion = values.TBien_Descripcion;
		finalValues.TBien_Estado = values.TBien_Estado;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var TBien_Codigo = $(that.element).find("input[name='TBien_Codigo']");
		TBien_Codigo.val('');
		var TBien_Descripcion = $(that.element).find("input[name='TBien_Descripcion']");
		TBien_Descripcion.val('');
		var TBien_Estado = $(that.element).find("select[name='TBien_Estado']");
		TBien_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
	},
	setAll: function (tipobienes) {
		var that = this;
		var TBien_Codigo = $(that.element).find("input[name='TBien_Codigo']");
		TBien_Codigo.val(tipobienes.TBien_Codigo);
		var TBien_Descripcion = $(that.element).find("input[name='TBien_Descripcion']");
		TBien_Descripcion.val(tipobienes.TBien_Descripcion);
		var TBien_Estado = $(that.element).find("select[name='TBien_Estado']");
		TBien_Estado.val(tipobienes.TBien_Estado);
	},
	showModal: function (accion,tipobienes) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-tipbien-save").show();
			$(that.element).children(".clss-btn-tipbien-update").hide();
		}
		else if(accion == 2) {
			that.setAll(tipobienes);
			$(that.element).children(".clss-btn-tipbien-save").hide();
			$(that.element).children(".clss-btn-tipbien-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-tipbien");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtTipoBienes) {
			$dtTipoBienes.DataTable().ajax.reload();
		}
	}
};
$.TipoBienes.defaultOptions = {
};

function fnTipoBienesDataTable(idTable) {
	$dtTipoBienes = $('#'+idTable);
	$dtTipoBienes.DataTable( {
		ajax: {
			url: MY_API_URL+'/tipo-bienes',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'TBien_Descripcion' },
			{ data: 'TBien_Estado' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$tipoBienes.prepareUpdate('+full.TBien_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$tipoBienes.delete('+full.TBien_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnTipoBienesModalOpen(accion, tipoBienes) {
	$tipoBienes.showModal(accion, tipoBienes);
}

var $dtTipoBienes = null;
var $tipoBienes = null;

function fnTipoBienesInit() {
	$tipoBienes = new $.TipoBienes($("#md_formulario_tipbien"));
	$tipoBienes.Init();
	fnTipoBienesDataTable('tb_tabla_tipbiens');
}
