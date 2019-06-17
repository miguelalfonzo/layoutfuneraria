/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Departamento = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Departamento.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-depar-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-depar-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/departamento',
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
		var Dep_Codigo = $(that.element).find("input[name='Dep_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/departamento/'+Dep_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Dep_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/departamento/'+Dep_Codigo,
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
			url: MY_API_URL+'/departamento',
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
							'<option value="'+value.Dep_Codigo+'">'+
							value.Dep_Descripcion+
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
			url: MY_API_URL+'/departamento',
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
							'<option value="'+value.Dep_Codigo+'">'+
							value.Dep_Descripcion+
							'</option>'
						);
					});
				
			}
		});
	},
	prepareUpdate: function(Dep_Codigo) {
		$.ajax({
			url: MY_API_URL+'/departamento/'+Dep_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnDepartamentoModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-depar");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Dep_Codigo = values.Dep_Codigo;
		finalValues.Dep_Descripcion = values.Dep_Descripcion;
		finalValues.Dep_Estado = values.Dep_Estado;
		finalValues.Pais_Codigo = values.Pais_Codigo;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Dep_Codigo = $(that.element).find("input[name='Dep_Codigo']");
		Dep_Codigo.val('');
		var Dep_Descripcion = $(that.element).find("input[name='Dep_Descripcion']");
		Dep_Descripcion.val('');
		var Dep_Estado = $(that.element).find("select[name='Dep_Estado']");
		Dep_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		$pais.getMany(Pais_Codigo, null);
	},
	setAll: function (departamento) {
		var that = this;
		var Dep_Codigo = $(that.element).find("input[name='Dep_Codigo']");
		Dep_Codigo.val(departamento.Dep_Codigo);
		var Dep_Descripcion = $(that.element).find("input[name='Dep_Descripcion']");
		Dep_Descripcion.val(departamento.Dep_Descripcion);
		var Dep_Estado = $(that.element).find("select[name='Dep_Estado']");
		Dep_Estado.val(departamento.Dep_Estado);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		Pais_Codigo.val(departamento.Pais_Codigo);
	},
	showModal: function (accion,departamento) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-depar-save").show();
			$(that.element).children(".clss-btn-depar-update").hide();
		}
		else if(accion == 2) {
			that.setAll(departamento);
			$(that.element).children(".clss-btn-depar-save").hide();
			$(that.element).children(".clss-btn-depar-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-depar");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtDepartamento) {
			$dtDepartamento.DataTable().ajax.reload();
		}
	}
};
$.Departamento.defaultOptions = {
};

function fnDepartamentoDataTable(idTable) {
	$dtDepartamento = $('#'+idTable);
	$dtDepartamento.DataTable( {
		ajax: {
			url: MY_API_URL+'/departamento',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Dep_Codigo' },
			{ data: 'Dep_Descripcion' },
			{ data: 'Pais_Descripcion' },
			{ data: 'Dep_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$departamento.prepareUpdate(\''+full.Dep_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$departamento.delete(\''+full.Dep_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnDepartamentoModalOpen(accion, departamento) {
	$departamento.showModal(accion, departamento);
}

var $dtDepartamento = null;
var $departamento = null;

function fnDepartamentoInit() {
	$pais = new $.Pais(null);
	$departamento = new $.Departamento($("#md_formulario_depar"));
	$departamento.Init();
	fnDepartamentoDataTable('tb_tabla_depar');
}
