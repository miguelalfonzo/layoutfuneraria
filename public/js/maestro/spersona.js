/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Persona = function(element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Persona.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-per-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-per-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/persona',
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
		var Per_Codigo = $(that.element).find("input[name='Per_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/persona/'+Per_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Per_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/persona/'+Per_Codigo,
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
	getMany: function(nObjeto, data) {
		$.ajax({
			url: MY_API_URL+'/persona',
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
							'<option value="'+value.Per_Codigo+'">'+
							value.Per_Nombre+
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
	prepareUpdate: function(Per_Codigo) {
		$.ajax({
			url: MY_API_URL+'/persona/'+Per_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnPerModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-per");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Per_Codigo = values.Per_Codigo;
		finalValues.Per_Nombre = values.Per_Nombre;
		finalValues.Per_Apellido = values.Per_Apellido;
		finalValues.Tip_Codigo = values.Tip_Codigo;
		finalValues.Per_Numerodoc = values.Per_Numerodoc;
		finalValues.Per_Direccion = values.Per_Direccion;
		finalValues.Per_Telmovil = values.Per_Telmovil;
		finalValues.Per_Telfijo = values.Per_Telfijo;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Per_Codigo = $(that.element).find("input[name='Per_Codigo']");
		Per_Codigo.val('');
		var Per_Nombre = $(that.element).find("input[name='Per_Nombre']");
		Per_Nombre.val('');
		var Per_Apellido = $(that.element).find("input[name='Per_Apellido']");
		Per_Apellido.val('');
		
		var Tip_Codigo = $(that.element).find("select[name='Tip_Codigo']");
		$tipo.getMany(Tip_Codigo, null);
		var Per_Numerodoc = $(that.element).find("input[name='Per_Numerodoc']");
		Per_Numerodoc.val('');
		
		var Per_Direccion = $(that.element).find("input[name='Per_Direccion']");
		Per_Direccion.val('');
		var Per_Telmovil = $(that.element).find("input[name='Per_Telmovil']");
		Per_Telmovil.val('');
		var Per_Telfijo = $(that.element).find("input[name='Per_Telfijo']");
		Per_Telfijo.val('');
	},
	setAll: function (persona) {
		var that = this;
		var Per_Codigo = $(that.element).find("input[name='Per_Codigo']");
		Per_Codigo.val(persona.Per_Codigo);
		var Per_Nombre = $(that.element).find("input[name='Per_Nombre']");
		Per_Nombre.val(persona.Per_Nombre);
		var Per_Apellido = $(that.element).find("input[name='Per_Apellido']");
		Per_Apellido.val(persona.Per_Apellido);
		
		var Tip_Codigo = $(that.element).find("select[name='Tip_Codigo']");
		Tip_Codigo.val(persona.Tip_Codigo);
		var Per_Numerodoc = $(that.element).find("input[name='Per_Numerodoc']");
		Per_Numerodoc.val(persona.Per_Numerodoc);
		
		var Per_Direccion = $(that.element).find("input[name='Per_Direccion']");
		Per_Direccion.val(persona.Per_Direccion);
		var Per_Telmovil = $(that.element).find("input[name='Per_Telmovil']");
		Per_Telmovil.val(persona.Per_Telmovil);
		var Per_Telfijo = $(that.element).find("input[name='Per_Telfijo']");
		Per_Telfijo.val(persona.Per_Telfijo);
	},
	showModal: function (accion,persona) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-per-save").show();
			$(that.element).children(".clss-btn-per-update").hide();
		}
		else if(accion == 2) {
			that.setAll(persona);
			$(that.element).children(".clss-btn-per-save").hide();
			$(that.element).children(".clss-btn-per-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-per");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtPersona) {
			$dtPersona.DataTable().ajax.reload();
		}
	}
};
$.Persona.defaultOptions = {
};

function fnPerDataTable(idTable) {
	$dtPersona = $('#'+idTable);
	$dtPersona.DataTable( {
		ajax: {
			url: MY_API_URL+'/persona',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Per_Nombre' },
			{ data: 'Per_Apellido' },
			{ data: 'Tip_Nombre' },
			{ data: 'Per_Numerodoc' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$persona.prepareUpdate('+full.Per_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$persona.delete('+full.Per_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnPerModalOpen(accion, persona) {
	$persona.showModal(accion, persona);
}

var $dtPersona = null;
var $persona = null;

function fnPersonaInit() {
	$tipo = new $.Tipo(null);
	$persona = new $.Persona($("#md_formulario_persona"));
	$persona.Init();
	fnPerDataTable('tb_tabla_personas');
}
