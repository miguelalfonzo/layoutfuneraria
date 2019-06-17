/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Clase = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Clase.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-clase-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-clase-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/clase',
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
		var Cla_Codigo = $(that.element).find("input[name='Cla_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/clase/'+Cla_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Cla_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/clase/'+Cla_Codigo,
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
			url: MY_API_URL+'/clase',
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
							'<option value="'+value.Cla_Codigo+'">'+
							value.Cla_Descripcion+
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
	prepareUpdate: function(Cla_Codigo) {
		$.ajax({
			url: MY_API_URL+'/clase/'+Cla_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnClaseModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-clase");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Cla_Codigo = values.Cla_Codigo;
		finalValues.Cla_Descripcion = values.Cla_Descripcion;
		finalValues.Cla_Estado = values.Cla_Estado;
		finalValues.Grupo_Gru_Codigo = values.Grupo_Gru_Codigo;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Cla_Codigo = $(that.element).find("input[name='Cla_Codigo']");
		Cla_Codigo.val('');
		var Cla_Descripcion = $(that.element).find("input[name='Cla_Descripcion']");
		Cla_Descripcion.val('');
		var Cla_Estado = $(that.element).find("select[name='Cla_Estado']");
		Cla_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
		var Grupo_Gru_Codigo = $(that.element).find("select[name='Grupo_Gru_Codigo']");
		$grupo.getMany(Grupo_Gru_Codigo, null);
	},
	setAll: function (clase) {
		var that = this;
		var Cla_Codigo = $(that.element).find("input[name='Cla_Codigo']");
		Cla_Codigo.val(clase.Cla_Codigo);
		var Cla_Descripcion = $(that.element).find("input[name='Cla_Descripcion']");
		Cla_Descripcion.val(clase.Cla_Descripcion);
		var Cla_Estado = $(that.element).find("select[name='Cla_Estado']");
		Cla_Estado.val(clase.Cla_Estado);
		var Grupo_Gru_Codigo = $(that.element).find("select[name='Grupo_Gru_Codigo']");
		Grupo_Gru_Codigo.val(clase.Grupo_Gru_Codigo);
	},
	showModal: function (accion,clase) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-clase-save").show();
			$(that.element).children(".clss-btn-clase-update").hide();
		}
		else if(accion == 2) {
			that.setAll(clase);
			$(that.element).children(".clss-btn-clase-save").hide();
			$(that.element).children(".clss-btn-clase-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-clase");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtClase) {
			$dtClase.DataTable().ajax.reload();
		}
	}
};
$.Clase.defaultOptions = {
};

function fnClaseDataTable(idTable) {
	$dtClase = $('#'+idTable);
	$dtClase.DataTable( {
		ajax: {
			url: MY_API_URL+'/clase',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Cla_Codigo' },
			{ data: 'Cla_Descripcion' },
			{ data: 'Gru_Descripcion' },
			{ data: 'Cla_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$clase.prepareUpdate(\''+full.Cla_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$clase.delete(\''+full.Cla_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnClaseModalOpen(accion, clase) {
	$clase.showModal(accion, clase);
}

var $dtClase = null;
var $clase = null;

function fnClaseInit() {
	$grupo = new $.Grupo(null);
	$clase = new $.Clase($("#md_formulario_clase"));
	$clase.Init();
	fnClaseDataTable('tb_tabla_clase');
}
