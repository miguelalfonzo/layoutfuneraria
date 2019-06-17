/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Proveedores = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Proveedores.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-provee-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-provee-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/proveedores',
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
			url: MY_API_URL+'/proveedores/'+Prov_Codigo.val(),
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
			url: MY_API_URL+'/proveedores/'+Prov_Codigo,
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
			url: MY_API_URL+'/proveedores',
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
							value.Prov_Razon_Social+
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
	prepareUpdate: function(Prov_Codigo) {
		$.ajax({
			url: MY_API_URL+'/proveedores/'+Prov_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnProveedoresModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-provee");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Prov_Codigo = values.Prov_Codigo;
		finalValues.Prov_Fecha = values.Prov_Fecha;
		finalValues.Prov_Tipo = values.Prov_Tipo;
		finalValues.Prov_Ruc = values.Prov_Ruc;
		finalValues.Prov_Razon_Social = values.Prov_Razon_Social;
		finalValues.Prov_Direccion = values.Prov_Direccion;
		finalValues.Prov_TeleFijo = values.Prov_TeleFijo;
		finalValues.Prov_Celular = values.Prov_Celular;
		finalValues.Prov_Email = values.Prov_Email;
		finalValues.Prov_Estado = values.Prov_Estado;
		finalValues.Dist_Codigo = values.Dist_Codigo;
		finalValues.Provi_Codigo = values.Provi_Codigo;
		finalValues.Dep_Codigo = values.Dep_Codigo;
		finalValues.Pais_Codigo = values.Pais_Codigo;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Prov_Codigo = $(that.element).find("input[name='Prov_Codigo']");
		Prov_Codigo.val('');
		var Prov_Fecha = $(that.element).find("input[name='Prov_Fecha']");
		Prov_Fecha.val('');
		var Prov_Tipo = $(that.element).find("select[name='Prov_Tipo']");
		Prov_Tipo.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Juridico</option>'+
			'<option value="2">Natural</option>'
		);
		var Prov_Ruc = $(that.element).find("input[name='Prov_Ruc']");
		Prov_Ruc.val('');
		var Prov_Razon_Social = $(that.element).find("input[name='Prov_Razon_Social']");
		Prov_Razon_Social.val('');
		var Prov_Direccion = $(that.element).find("input[name='Prov_Direccion']");
		Prov_Direccion.val('');
		var Prov_TeleFijo = $(that.element).find("input[name='Prov_TeleFijo']");
		Prov_TeleFijo.val('');
		var Prov_Celular = $(that.element).find("input[name='Prov_Celular']");
		Prov_Celular.val('');
		var Prov_Email = $(that.element).find("input[name='Prov_Email']");
		Prov_Email.val('');
		var Prov_Estado = $(that.element).find("select[name='Prov_Estado']");
		Prov_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="2">Inactivo</option>'
		);
		var Dist_Codigo = $(that.element).find("select[name='Dist_Codigo']");
		$distrito.getMany(Dist_Codigo, null);
		var Provi_Codigo = $(that.element).find("select[name='Provi_Codigo']");
		$provincia.getMany(Provi_Codigo, null);
		var Dep_Codigo = $(that.element).find("select[name='Dep_Codigo']");
		$departamento.getMany(Dep_Codigo, null);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		$pais.getMany(Pais_Codigo, null);
	},
	setAll: function (proveedores) {
		var that = this;
		var Prov_Codigo = $(that.element).find("input[name='Prov_Codigo']");
		Prov_Codigo.val(proveedores.Prov_Codigo);
		var Prov_Fecha = $(that.element).find("input[name='Prov_Fecha']");
		Prov_Fecha.val(proveedores.Prov_Fecha);
		var Prov_Tipo = $(that.element).find("input[name='Prov_Tipo']");
		Prov_Tipo.val(proveedores.Prov_Tipo);
		var Prov_Ruc = $(that.element).find("input[name='Prov_Ruc']");
		Prov_Ruc.val(proveedores.Prov_Ruc);
		var Prov_Razon_Social = $(that.element).find("input[name='Prov_Razon_Social']");
		Prov_Razon_Social.val(proveedores.Prov_Razon_Social);
		var Prov_Direccion = $(that.element).find("input[name='Prov_Direccion']");
		Prov_Direccion.val(proveedores.Prov_Direccion);
		var Prov_TeleFijo = $(that.element).find("input[name='Prov_TeleFijo']");
		Prov_TeleFijo.val(proveedores.Prov_TeleFijo);
		var Prov_Celular = $(that.element).find("input[name='Prov_Celular']");
		Prov_Celular.val(proveedores.Prov_Celular);
		var Prov_Email = $(that.element).find("input[name='Prov_Email']");
		Prov_Email.val(proveedores.Prov_Email);
		var Prov_Estado = $(that.element).find("select[name='Prov_Estado']");
		Prov_Estado.val(proveedores.Prov_Estado);
		var Dist_Codigo = $(that.element).find("select[name='Dist_Codigo']");
		Dist_Codigo.val(proveedores.Dist_Codigo);
		var Provi_Codigo = $(that.element).find("select[name='Provi_Codigo']");
		Provi_Codigo.val(proveedores.Provi_Codigo);
		var Dep_Codigo = $(that.element).find("input[name='Dep_Codigo']");
		Dep_Codigo.val(proveedores.Dep_Codigo);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		Pais_Codigo.val(proveedores.Pais_Codigo);
	},
	showModal: function (accion,proveedores) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-provee-save").show();
			$(that.element).children(".clss-btn-provee-update").hide();
		}
		else if(accion == 2) {
			that.setAll(proveedores);
			$(that.element).children(".clss-btn-provee-save").hide();
			$(that.element).children(".clss-btn-provee-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-provee");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtProveedores) {
			$dtProveedores.DataTable().ajax.reload();
		}
	}
};
$.Proveedores.defaultOptions = {
};

function fnProveedoresDataTable(idTable) {
	$dtProveedores = $('#'+idTable);
	$dtProveedores.DataTable( {
		ajax: {
			url: MY_API_URL+'/proveedores',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Prov_Tipo_Texto' },
			{ data: 'Prov_Ruc' },
			{ data: 'Prov_Razon_Social' },
			{ data: 'Prov_TeleFijo' },
			{ data: 'Prov_Celular' },
			{ data: 'Prov_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$proveedores.prepareUpdate(\''+full.Prov_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$proveedores.delete(\''+full.Prov_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnProveedoresModalOpen(accion, proveedores) {
	$proveedores.showModal(accion, proveedores);
}

var $dtProveedores = null;
var $proveedores = null;

function fnProveedoresInit() {
	$pais = new $.Pais(null);
	$departamento = new $.Departamento(null);
	$provincia = new $.Provincia(null);
	$distrito = new $.Distrito(null);
	$proveedores = new $.Proveedores($("#md_formulario_provee"));
	$proveedores.Init();
	fnProveedoresDataTable('tb_tabla_provee');
}
