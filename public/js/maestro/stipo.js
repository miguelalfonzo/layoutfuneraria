/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Tipo = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Tipo.prototype = {
	InitEvents: function () {
		var that = this;
	},
	insert: function () {
	},
	update: function () {
	},
	delete: function () {
	},
	getMany: function (nObjeto, data) {
		$.ajax({
			url: MY_API_URL+'/tipo',
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
							'<option value="'+value.Tip_Codigo+'">'+
							value.Tip_Nombre+
							'</option>'
						);
					});
				}
			}
		});
	},
	getOne: function () {
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-tip");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		return values;
	}
};
$.Tipo.defaultOptions = {
};
function fnTipDataTable(idTable) {
	$dtTipo = $('#'+idTable);
	$dtTipo.DataTable({
		ajax: {
			url: MY_API_URL+'/tipo',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Tip_Codigo' },
			{ data: 'Tip_Nombre' }
		]
	});
}

var $dtTipo = null;
var $tipo = null;

function fnTipoInit() {
	$tipo = new $.Tipo($("#md_formulario_tipo"));
	fnTipDataTable('tb_tabla_tipos');
}
