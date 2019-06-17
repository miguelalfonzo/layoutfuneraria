/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Usuario = function(element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Usuario.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-usu-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-usu-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/usuario',
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
		var Usu_Codigo = $(that.element).find("input[name='Usu_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/usuario/'+Usu_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Usu_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/usuario/'+Usu_Codigo,
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
			url: MY_API_URL+'/usuario',
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
	prepareUpdate: function(Usu_Codigo) {
		$.ajax({
			url: MY_API_URL+'/usuario/'+Usu_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnUsuModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-usu");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Usu_Codigo = values.Usu_Codigo;
		finalValues.Usu_Nombre = values.Usu_Nombre;
		
		finalValues.Usu_Clave = values.Usu_Clave;
		finalValues.Rol_Codigo = values.Rol_Codigo;
		finalValues.Usu_Estado = values.Usu_Estado;
		finalValues.Tip_Codigo = values.Tip_Codigo;
		finalValues.Per_Numerodoc = values.Per_Numerodoc;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Usu_Codigo = $(that.element).find("input[name='Usu_Codigo']");
		Usu_Codigo.val('');
		var Usu_Nombre = $(that.element).find("input[name='Usu_Nombre']");
		Usu_Nombre.val('');
		var Usu_Clave = $(that.element).find("input[name='Usu_Clave']");
		Usu_Clave.val('');
		var Rol_Codigo = $(that.element).find("select[name='Rol_Codigo']");
		$rol.getMany(Rol_Codigo, null);
		var Usu_Estado = $(that.element).find("select[name='Usu_Estado']");
		Usu_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Desactivo</option>'
		);

		var Tip_Codigo = $(that.element).find("select[name='Tip_Codigo']");
		$tipo.getMany(Tip_Codigo, null);
	},
	setAll: function (usuario) {
		var that = this;
		var Usu_Codigo = $(that.element).find("input[name='Usu_Codigo']");
		Usu_Codigo.val(usuario.Usu_Codigo);
		var Usu_Nombre = $(that.element).find("input[name='Usu_Nombre']");
		Usu_Nombre.val(usuario.Usu_Nombre);
		var Usu_Clave = $(that.element).find("input[name='Usu_Clave']");
		Usu_Clave.val('...');
		var Rol_Codigo = $(that.element).find("select[name='Rol_Codigo']");
		Rol_Codigo.val(usuario.Rol_Codigo);
		var Usu_Estado = $(that.element).find("select[name='Usu_Estado']");
		Usu_Estado.val(usuario.Usu_Estado);

		var Tip_Codigo = $(that.element).find("select[name='Tip_Codigo']");
		Tip_Codigo.val(usuario.Tip_Codigo);
		var Per_Numerodoc = $(that.element).find("input[name='Per_Numerodoc']");
		Per_Numerodoc.val(usuario.Per_Numerodoc);
	},
	showModal: function (accion,usuario) {
		var that = this;
		if(accion == 1) {
			$(that.element).children(".clss-btn-usu-save").show();
			$(that.element).children(".clss-btn-usu-update").hide();
		}
		else if(accion == 2) {
			that.setAll(usuario);
			$(that.element).children(".clss-btn-usu-save").hide();
			$(that.element).children(".clss-btn-usu-update").show();
		}
		that.element.modal('show');
	},
	hideModal: function () {
		var that = this;
		var _link = $(that.element).find(".clss-a-usu");
		_link.click();
	},
	reloadDataTable: function () {
		if($dtUsuario) {
			$dtUsuario.DataTable().ajax.reload();
		}
	}
};
$.Usuario.defaultOptions = {
};

function fnUsuDataTable(idTable) {
	$dtUsuario = $('#'+idTable);
	$dtUsuario.DataTable( {
		ajax: {
			url: MY_API_URL+'/usuario',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Usu_Nombre' },
			{ data: 'Rol_Nombre' },
			{ data: 'Usu_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$usuario.prepareUpdate('+full.Usu_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$usuario.delete('+full.Usu_Codigo+');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
}

function fnUsuModalOpen(accion, usuario) {
	$usuario.showModal(accion, usuario);
}

var $dtUsuario = null;
var $usuario = null;

function fnUsuarioInit() {
	$rol = new $.Rol(null);
	$tipo = new $.Tipo(null);
	$usuario = new $.Usuario($("#md_formulario_usuario"));
	$usuario.Init();
	fnUsuDataTable('tb_tabla_usuarios');
}
