/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Provincia = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Provincia.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-provi-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-provi-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/provincia',
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
		var Prov_Codigo = $(that.element).find("input[name='Prov_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/provincia/'+Prov_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Prov_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/provincia/'+Prov_Codigo,
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
			url: MY_API_URL+'/provincia',
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
							'<option value="'+value.Prov_Codigo+'">'+
							value.Prov_Descripcion+
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
			url: MY_API_URL+'/provincia',
			data: data,
			type: 'GET',
			dataType: 'json',
			success: function(rows) {
					nObjeto.empty();
					nObjeto.append(
						'<option value="">Seleccione</option>'
					);
					$.each(rows, function( index, value ) {
						nObjeto.append(
							'<option value="'+value.Prov_Codigo+'">'+
							value.Prov_Descripcion+
							'</option>'
						);
					});
				
			}
		});
	},
	prepareUpdate: function(Prov_Codigo) {
		$.ajax({
			url: MY_API_URL+'/provincia/'+Prov_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnProvinciaModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-provi");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Prov_Codigo = values.Prov_Codigo;
		finalValues.Prov_Descripcion = values.Prov_Descripcion;
		finalValues.Prov_Estado = values.Prov_Estado;
		finalValues.Dep_Codigo = values.Dep_Codigo;
		finalValues.Pais_Codigo = values.Pais_Codigo;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Prov_Codigo = $(that.element).find("input[name='Prov_Codigo']");
		Prov_Codigo.val('');
		var Prov_Descripcion = $(that.element).find("input[name='Prov_Descripcion']");
		Prov_Descripcion.val('');
		var Prov_Estado = $(that.element).find("select[name='Prov_Estado']");
		Prov_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
		var Dep_Codigo = $(that.element).find("select[name='Dep_Codigo']");
		$departamento.getMany(Dep_Codigo, null);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		$pais.getMany(Pais_Codigo, null);
	},
	setAll: function (provincia) {
		var that = this;
		var Prov_Codigo = $(that.element).find("input[name='Prov_Codigo']");
		Prov_Codigo.val(provincia.Prov_Codigo);
		var Prov_Descripcion = $(that.element).find("input[name='Prov_Descripcion']");
		Prov_Descripcion.val(provincia.Prov_Descripcion);
		var Prov_Estado = $(that.element).find("select[name='Prov_Estado']");
		Prov_Estado.val(provincia.Prov_Estado);
		var Dep_Codigo = $(that.element).find("input[name='Dep_Codigo']");
		Dep_Codigo.val(provincia.Dep_Codigo);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		Pais_Codigo.val(provincia.Pais_Codigo);
	},
	showModal: function (accion,provincia) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-provi-save").show();
			$(that.element).children(".clss-btn-provi-update").hide();
		}
		else if(accion == 2) {
			that.setAll(provincia);
			$(that.element).children(".clss-btn-provi-save").hide();
			$(that.element).children(".clss-btn-provi-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-provi");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtProvincia) {
			$dtProvincia.DataTable().ajax.reload();
		}
	}
};
$.Provincia.defaultOptions = {
};

function fnProvinciaDataTable(idTable) {
	$dtProvincia = $('#'+idTable);
	$dtProvincia.DataTable( {
		ajax: {
			url: MY_API_URL+'/provincia',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Prov_Codigo' },
			{ data: 'Prov_Descripcion' },
			{ data: 'Pais_Descripcion' },
			{ data: 'Dep_Descripcion' },
			{ data: 'Prov_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$provincia.prepareUpdate(\''+full.Prov_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$provincia.delete(\''+full.Prov_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnProvinciaModalOpen(accion, provincia) {
	$provincia.showModal(accion, provincia);
}

var $dtProvincia = null;
var $provincia = null;

function fnProvinciaInit() {
	$pais = new $.Pais(null);
	$departamento = new $.Departamento(null);
	$provincia = new $.Provincia($("#md_formulario_provi"));
	$provincia.Init();
	fnProvinciaDataTable('tb_tabla_provi');
}
