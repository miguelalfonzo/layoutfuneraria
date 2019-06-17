/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Rol = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Rol.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-rol-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-rol-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/rol',
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
		var Rol_Codigo = $(that.element).find("input[name='Rol_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/rol/'+Rol_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Rol_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/rol/'+Rol_Codigo,
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
			url: MY_API_URL+'/rol',
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
							'<option value="'+value.Rol_Codigo+'">'+
							value.Rol_Nombre+
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
	prepareUpdate: function(Rol_Codigo) {
		$.ajax({
			url: MY_API_URL+'/rol/'+Rol_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnRolModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-rol");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Rol_Codigo = values.Rol_Codigo;
		finalValues.Rol_Nombre = values.Rol_Nombre;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Rol_Codigo = $(that.element).find("input[name='Rol_Codigo']");
		Rol_Codigo.val('');
		var Rol_Nombre = $(that.element).find("input[name='Rol_Nombre']");
		Rol_Nombre.val('');
	},
	setAll: function (rol) {
		var that = this;
		var Rol_Codigo = $(that.element).find("input[name='Rol_Codigo']");
		Rol_Codigo.val(rol.Rol_Codigo);
		var Rol_Nombre = $(that.element).find("input[name='Rol_Nombre']");
		Rol_Nombre.val(rol.Rol_Nombre);
	},
	showModal: function (accion,rol) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-rol-save").show();
			$(that.element).children(".clss-btn-rol-update").hide();
		}
		else if(accion == 2) {
			that.setAll(rol);
			$(that.element).children(".clss-btn-rol-save").hide();
			$(that.element).children(".clss-btn-rol-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-rol");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtRol) {
			$dtRol.DataTable().ajax.reload();
		}
	}
};
$.Rol.defaultOptions = {
};

function fnRolDataTable(idTable) {
	$dtRol = $('#'+idTable);
	$dtRol.DataTable( {
		ajax: {
			url: MY_API_URL+'/rol',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Rol_Nombre' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$rol.prepareUpdate('+full.Rol_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$rol.delete('+full.Rol_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnRolModalOpen(accion, rol) {
	$rol.showModal(accion, rol);
}

var $dtRol = null;
var $rol = null;

function fnRolInit() {
	$rol = new $.Rol($("#md_formulario_rol"));
	$rol.Init();
	fnRolDataTable('tb_tabla_roles');
}
