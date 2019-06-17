/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Distrito = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Distrito.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-distrito-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-distrito-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/distrito',
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
		var Dist_Codigo = $(that.element).find("input[name='Dist_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/distrito/'+Dist_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Dist_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/distrito/'+Dist_Codigo,
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
			url: MY_API_URL+'/distrito',
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
							'<option value="'+value.Dist_Codigo+'">'+
							value.Dist_Descripcion+
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
			url: MY_API_URL+'/distrito',
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
							'<option value="'+value.Dist_Codigo+'">'+
							value.Dist_Descripcion+
							'</option>'
						);
					});
				
			}
		});
	},
	prepareUpdate: function(Dist_Codigo) {
		$.ajax({
			url: MY_API_URL+'/distrito/'+Dist_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnDistritoModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-distrito");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Dist_Codigo = values.Dist_Codigo;
		finalValues.Dist_Descripcion = values.Dist_Descripcion;
		finalValues.Dist_Estado = values.Dist_Estado;
		finalValues.Prov_Codigo = values.Prov_Codigo;
		finalValues.Dep_Codigo = values.Dep_Codigo;
		finalValues.Pais_Codigo = values.Pais_Codigo;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Dist_Codigo = $(that.element).find("input[name='Dist_Codigo']");
		Dist_Codigo.val('');
		var Dist_Descripcion = $(that.element).find("input[name='Dist_Descripcion']");
		Dist_Descripcion.val('');
		var Dist_Estado = $(that.element).find("select[name='Dist_Estado']");
		Dist_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
		var Prov_Codigo = $(that.element).find("select[name='Prov_Codigo']");
		$provincia.getMany(Prov_Codigo, null);
		var Dep_Codigo = $(that.element).find("select[name='Dep_Codigo']");
		$departamento.getMany(Dep_Codigo, null);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		$pais.getMany(Pais_Codigo, null);
	},
	setAll: function (distrito) {
		var that = this;
		var Dist_Codigo = $(that.element).find("input[name='Dist_Codigo']");
		Dist_Codigo.val(distrito.Dist_Codigo);
		var Dist_Descripcion = $(that.element).find("input[name='Dist_Descripcion']");
		Dist_Descripcion.val(distrito.Dist_Descripcion);
		var Dist_Estado = $(that.element).find("select[name='Dist_Estado']");
		Dist_Estado.val(distrito.Dist_Estado);
		var Prov_Codigo = $(that.element).find("select[name='Prov_Codigo']");
		Prov_Codigo.val(distrito.Prov_Codigo);
		var Dep_Codigo = $(that.element).find("input[name='Dep_Codigo']");
		Dep_Codigo.val(distrito.Dep_Codigo);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		Pais_Codigo.val(distrito.Pais_Codigo);
	},
	showModal: function (accion,distrito) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-distrito-save").show();
			$(that.element).children(".clss-btn-distrito-update").hide();
		}
		else if(accion == 2) {
			that.setAll(distrito);
			$(that.element).children(".clss-btn-distrito-save").hide();
			$(that.element).children(".clss-btn-distrito-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-distrito");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtDistrito) {
			$dtDistrito.DataTable().ajax.reload();
		}
	}
};
$.Distrito.defaultOptions = {
};

function fnDistritoDataTable(idTable) {
	$dtDistrito = $('#'+idTable);
	$dtDistrito.DataTable( {
		ajax: {
			url: MY_API_URL+'/distrito',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Dist_Codigo' },
			{ data: 'Dist_Descripcion' },
			{ data: 'Pais_Descripcion' },
			{ data: 'Dep_Descripcion' },
			{ data: 'Prov_Descripcion' },
			{ data: 'Dist_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$distrito.prepareUpdate(\''+full.Dist_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$distrito.delete(\''+full.Dist_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnDistritoModalOpen(accion, distrito) {
	$distrito.showModal(accion, distrito);
}

var $dtDistrito = null;
var $distrito = null;

function fnDistritoInit() {
	$pais = new $.Pais(null);
	$departamento = new $.Departamento(null);
	$provincia = new $.Provincia(null);
	$distrito = new $.Distrito($("#md_formulario_distrito"));
	$distrito.Init();
	fnDistritoDataTable('tb_tabla_distrito');
}
