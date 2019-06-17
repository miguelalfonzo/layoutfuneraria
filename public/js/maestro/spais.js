/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Pais = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Pais.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-pais-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-pais-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/pais',
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
		var Pais_Codigo = $(that.element).find("input[name='Pais_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/pais/'+Pais_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Pais_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/pais/'+Pais_Codigo,
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
			url: MY_API_URL+'/pais',
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
							'<option value="'+value.Pais_Codigo+'">'+
							value.Pais_Descripcion+
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
			url: MY_API_URL+'/pais',
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
						'<option value="'+value.Pais_Codigo+'">'+
						value.Pais_Descripcion+
						'</option>'
					);
				});
			}
		});
	},
	prepareUpdate: function(Pais_Codigo) {
		$.ajax({
			url: MY_API_URL+'/pais/'+Pais_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnPaisModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-pais");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Pais_Codigo = values.Pais_Codigo;
		finalValues.Pais_Descripcion = values.Pais_Descripcion;
		finalValues.Pais_Estado = values.Pais_Estado;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Pais_Codigo = $(that.element).find("input[name='Pais_Codigo']");
		Pais_Codigo.val('');
		var Pais_Descripcion = $(that.element).find("input[name='Pais_Descripcion']");
		Pais_Descripcion.val('');
		var Pais_Estado = $(that.element).find("select[name='Pais_Estado']");
		Pais_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
	},
	setAll: function (pais) {
		var that = this;
		var Pais_Codigo = $(that.element).find("input[name='Pais_Codigo']");
		Pais_Codigo.val(pais.Pais_Codigo);
		var Pais_Descripcion = $(that.element).find("input[name='Pais_Descripcion']");
		Pais_Descripcion.val(pais.Pais_Descripcion);
		var Pais_Estado = $(that.element).find("select[name='Pais_Estado']");
		Pais_Estado.val(pais.Pais_Estado);
	},
	showModal: function (accion,pais) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-pais-save").show();
			$(that.element).children(".clss-btn-pais-update").hide();
		}
		else if(accion == 2) {
			that.setAll(pais);
			$(that.element).children(".clss-btn-pais-save").hide();
			$(that.element).children(".clss-btn-pais-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-pais");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtPais) {
			$dtPais.DataTable().ajax.reload();
		}
	}
};
$.Pais.defaultOptions = {
};

function fnPaisDataTable(idTable) {
	$dtPais = $('#'+idTable);
	$dtPais.DataTable( {
		ajax: {
			url: MY_API_URL+'/pais',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Pais_Codigo' },
			{ data: 'Pais_Descripcion' },
			{ data: 'Pais_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$pais.prepareUpdate(\''+full.Pais_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$pais.delete(\''+full.Pais_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnPaisModalOpen(accion, pais) {
	$pais.showModal(accion, pais);
}

var $dtPais = null;
var $pais = null;

function fnPaisInit() {
	$pais = new $.Pais($("#md_formulario_pais"));
	$pais.Init();
	fnPaisDataTable('tb_tabla_pais');
}
