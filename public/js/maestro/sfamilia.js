/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Familia = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Familia.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-familia-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-familia-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/familia',
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
		var Fam_Codigo = $(that.element).find("input[name='Fam_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/familia/'+Fam_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Fam_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/familia/'+Fam_Codigo,
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
			url: MY_API_URL+'/familia',
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
							'<option value="'+value.Fam_Codigo+'">'+
							value.Fam_Descripcion+
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
	prepareUpdate: function(Fam_Codigo) {
		$.ajax({
			url: MY_API_URL+'/familia/'+Fam_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnFamiliaModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-familia");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Fam_Codigo = values.Fam_Codigo;
		finalValues.Fam_Descripcion = values.Fam_Descripcion;
		finalValues.Fam_Estado = values.Fam_Estado;
		finalValues.Clase_Cla_Codigo = values.Clase_Cla_Codigo;
		finalValues.Grupo_Gru_Codigo = values.Grupo_Gru_Codigo;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Fam_Codigo = $(that.element).find("input[name='Fam_Codigo']");
		Fam_Codigo.val('');
		var Fam_Descripcion = $(that.element).find("input[name='Fam_Descripcion']");
		Fam_Descripcion.val('');
		var Fam_Estado = $(that.element).find("select[name='Fam_Estado']");
		Fam_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
		var Clase_Cla_Codigo = $(that.element).find("select[name='Clase_Cla_Codigo']");
		$clase.getMany(Clase_Cla_Codigo, null);
		var Grupo_Gru_Codigo = $(that.element).find("select[name='Grupo_Gru_Codigo']");
		$grupo.getMany(Grupo_Gru_Codigo, null);
	},
	setAll: function (familia) {
		var that = this;
		var Fam_Codigo = $(that.element).find("input[name='Fam_Codigo']");
		Fam_Codigo.val(familia.Fam_Codigo);
		var Fam_Descripcion = $(that.element).find("input[name='Fam_Descripcion']");
		Fam_Descripcion.val(familia.Fam_Descripcion);
		var Fam_Estado = $(that.element).find("select[name='Fam_Estado']");
		Fam_Estado.val(familia.Fam_Estado);
		var Clase_Cla_Codigo = $(that.element).find("select[name='Clase_Cla_Codigo']");
		Clase_Cla_Codigo.val(familia.Clase_Cla_Codigo);
		var Grupo_Gru_Codigo = $(that.element).find("select[name='Grupo_Gru_Codigo']");
		Grupo_Gru_Codigo.val(familia.Grupo_Gru_Codigo);
	},
	showModal: function (accion,familia) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-familia-save").show();
			$(that.element).children(".clss-btn-familia-update").hide();
		}
		else if(accion == 2) {
			that.setAll(familia);
			$(that.element).children(".clss-btn-familia-save").hide();
			$(that.element).children(".clss-btn-familia-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-familia");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtFamilia) {
			$dtFamilia.DataTable().ajax.reload();
		}
	}
};
$.Familia.defaultOptions = {
};

function fnFamiliaDataTable(idTable) {
	$dtFamilia = $('#'+idTable);
	$dtFamilia.DataTable( {
		ajax: {
			url: MY_API_URL+'/familia',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Fam_Codigo' },
			{ data: 'Fam_Descripcion' },
			{ data: 'Fam_Estado_Texto' },
			{ data: 'Gru_Descripcion' },
			{ data: 'Cla_Descripcion' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$familia.prepareUpdate(\''+full.Fam_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$familia.delete(\''+full.Fam_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnFamiliaModalOpen(accion, familia) {
	$familia.showModal(accion, familia);
}

var $dtFamilia = null;
var $familia = null;

function fnFamiliaInit() {
	$grupo = new $.Grupo(null);
	$clase = new $.Clase(null);
	$familia = new $.Familia($("#md_formulario_familia"));
	$familia.Init();
	fnFamiliaDataTable('tb_tabla_familia');
}
