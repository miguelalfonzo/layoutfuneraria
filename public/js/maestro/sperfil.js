/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

/* $.Grupo = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Grupo.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-grupo-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-grupo-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/grupo',
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
		var Gru_Codigo = $(that.element).find("input[name='Gru_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/grupo/'+Gru_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Gru_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/grupo/'+Gru_Codigo,
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
			url: MY_API_URL+'/grupo',
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
							'<option value="'+value.Gru_Codigo+'">'+
							value.Gru_Descripcion+
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
	prepareUpdate: function(Gru_Codigo) {
		$.ajax({
			url: MY_API_URL+'/grupo/'+Gru_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnGrupoModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-grupo");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Gru_Codigo = values.Gru_Codigo;
		finalValues.Gru_Descripcion = values.Gru_Descripcion;
		finalValues.Gru_Estado = values.Gru_Estado;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Gru_Codigo = $(that.element).find("input[name='Gru_Codigo']");
		Gru_Codigo.val('');
		var Gru_Descripcion = $(that.element).find("input[name='Gru_Descripcion']");
		Gru_Descripcion.val('');
		var Gru_Estado = $(that.element).find("select[name='Gru_Estado']");
		Gru_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);
	},
	setAll: function (grupo) {
		var that = this;
		var Gru_Codigo = $(that.element).find("input[name='Gru_Codigo']");
		Gru_Codigo.val(grupo.Gru_Codigo);
		var Gru_Descripcion = $(that.element).find("input[name='Gru_Descripcion']");
		Gru_Descripcion.val(grupo.Gru_Descripcion);
		var Gru_Estado = $(that.element).find("select[name='Gru_Estado']");
		Gru_Estado.val(grupo.Gru_Estado);
	},
	showModal: function (accion,grupo) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-grupo-save").show();
			$(that.element).children(".clss-btn-grupo-update").hide();
		}
		else if(accion == 2) {
			that.setAll(grupo);
			$(that.element).children(".clss-btn-grupo-save").hide();
			$(that.element).children(".clss-btn-grupo-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-grupo");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtGrupo) {
			$dtGrupo.DataTable().ajax.reload();
		}
	}
};
$.Grupo.defaultOptions = {
};

function fnGrupoDataTable(idTable) {
	$dtGrupo = $('#'+idTable);
	$dtGrupo.DataTable( {
		ajax: {
			url: MY_API_URL+'/grupo',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Gru_Codigo' },
			{ data: 'Gru_Descripcion' },
			{ data: 'Gru_Estado' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$grupo.prepareUpdate(\''+full.Gru_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$grupo.delete(\''+full.Gru_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnGrupoModalOpen(accion, grupo) {
	$grupo.showModal(accion, grupo);
}

var $dtGrupo = null; 
var $grupo = null; */

function fnGrupoInit() {
	/* $grupo = new $.Grupo($("#md_formulario_grupo"));
	$grupo.Init();
	fnGrupoDataTable('tb_tabla_grupo'); */
	alert("hola");
}
