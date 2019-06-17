/* ................ */
/*  Autor. SYLAR.JM */
/* ................ */

$.Clientes = function (element) {
	this.element = (element instanceof $) ? element : $(element);
};
$.Clientes.prototype = {
	Init: function() {
		var that = this;
		that.InitEvents();
		that.setDefault();
	},
	InitEvents: function() {
		var that = this;
		var buttonInsert = $(that.element).find(".clss-btn-clientes-save");
		buttonInsert.click(function(){
			that.insert();
		});
		var buttonUpdate = $(that.element).find(".clss-btn-clientes-update");
		buttonUpdate.click(function(){
			that.update();
		});
	},
	insert: function() {
		var that = this;
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/clientes',
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
		var Cli_Codigo = $(that.element).find("input[name='Cli_Codigo']");
		var values = that.getValues();
		$.ajax({
			url: MY_API_URL+'/clientes/'+Cli_Codigo.val(),
			data: values,
			type: 'PUT',
			dataType: 'json',
			success: function(data) {
				that.hideModal();
				that.reloadDataTable();
			}
		});
	},
	delete: function(Cli_Codigo) {
		var that = this;
		var token = $("#my_token").val();
		$.ajax({
			url: MY_API_URL+'/clientes/'+Cli_Codigo,
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
			url: MY_API_URL+'/clientes',
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
							'<option value="'+value.Cli_Codigo+'">'+
							value.Cli_Nro_Docu+
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
	prepareUpdate: function(Cli_Codigo) {
		$.ajax({
			url: MY_API_URL+'/clientes/'+Cli_Codigo,
			data: "",
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				fnClientesModalOpen(2, data);
			}
		});
	},
	getValues: function () {
		var that = this;
		var form = that.element.find(".clss-fm-clientes");
		var values = {};
		$.each(form.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var finalValues = {};
		var token = $("#my_token").val();
		finalValues.Cli_Codigo = values.Cli_Codigo;
		finalValues.Cli_Tipo_Persona = values.Cli_Tipo_Persona;
		finalValues.Cli_Direccion = values.Cli_Direccion;
		finalValues.Cli_Email = values.Cli_Email;
		finalValues.Cli_Telefono = values.Cli_Telefono;
		finalValues.Cli_Estado = values.Cli_Estado;
		finalValues.Tdoc_Codigo = values.Tdoc_Codigo;
		finalValues.Dist_Codigo = values.Dist_Codigo;
		finalValues.Prov_Codigo = values.Prov_Codigo;
		finalValues.Dep_Codigo = values.Dep_Codigo;
		finalValues.Pais_Codigo = values.Pais_Codigo;
		finalValues.Cli_Nro_Docu = values.Cli_Nro_Docu;
		finalValues._token = token;
		return finalValues;
	},
	setDefault: function () {
		var that = this;
		var Cli_Codigo = $(that.element).find("input[name='Cli_Codigo']");
		Cli_Codigo.val('');
		var Cli_Tipo_Persona = $(that.element).find("select[name='Cli_Tipo_Persona']");
		Cli_Tipo_Persona.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Juridico</option>'+
			'<option value="2">Natural</option>'
		);
		var Cli_Direccion = $(that.element).find("input[name='Cli_Direccion']");
		Cli_Direccion.val('');
		var Cli_Email = $(that.element).find("input[name='Cli_Email']");
		Cli_Email.val('');
		var Cli_Telefono = $(that.element).find("input[name='Cli_Telefono']");
		Cli_Telefono.val('');
		var Cli_Estado = $(that.element).find("select[name='Cli_Estado']");
		Cli_Estado.append(
			'<option value="">Seleccione</option>'+
			'<option value="1">Activo</option>'+
			'<option value="0">Inactivo</option>'
		);
		var Tdoc_Codigo = $(that.element).find("select[name='Tdoc_Codigo']");
		$tipoDocumento.loadComboBox(Tdoc_Codigo, null);
		var Dist_Codigo = $(that.element).find("select[name='Dist_Codigo']");
		$distrito.loadComboBox(Dist_Codigo, null);
		var Prov_Codigo = $(that.element).find("select[name='Prov_Codigo']");
		$provincia.loadComboBox(Prov_Codigo, null);
		var Dep_Codigo = $(that.element).find("select[name='Dep_Codigo']");
		$departamento.loadComboBox(Dep_Codigo, null);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		$pais.loadComboBox(Pais_Codigo, null);
		var Cli_Nro_Docu = $(that.element).find("input[name='Cli_Nro_Docu']");
		Cli_Nro_Docu.val('');
	},
	setAll: function (clientes) {
		var that = this;
		var Cli_Codigo = $(that.element).find("input[name='Cli_Codigo']");
		Cli_Codigo.val(clientes.Cli_Codigo);
		var Cli_Tipo_Persona = $(that.element).find("input[name='Cli_Tipo_Persona']");
		Cli_Tipo_Persona.val(clientes.Cli_Tipo_Persona);
		var Cli_Direccion = $(that.element).find("input[name='Cli_Direccion']");
		Cli_Direccion.val(clientes.Cli_Direccion);
		var Cli_Email = $(that.element).find("input[name='Cli_Email']");
		Cli_Email.val(clientes.Cli_Email);
		var Cli_Telefono = $(that.element).find("input[name='Cli_Telefono']");
		Cli_Telefono.val(clientes.Cli_Telefono);
		var Cli_Estado = $(that.element).find("select[name='Cli_Estado']");
		Cli_Estado.val(clientes.Cli_Estado);
		var Tdoc_Codigo = $(that.element).find("select[name='Tdoc_Codigo']");
		Tdoc_Codigo.val(clientes.Tdoc_Codigo);
		var Dist_Codigo = $(that.element).find("select[name='Dist_Codigo']");
		Dist_Codigo.val(clientes.Dist_Codigo);
		var Prov_Codigo = $(that.element).find("select[name='Prov_Codigo']");
		Prov_Codigo.val(clientes.Prov_Codigo);
		var Dep_Codigo = $(that.element).find("select[name='Dep_Codigo']");
		Dep_Codigo.val(clientes.Dep_Codigo);
		var Pais_Codigo = $(that.element).find("select[name='Pais_Codigo']");
		Pais_Codigo.val(clientes.Pais_Codigo);
		var Cli_Nro_Docu = $(that.element).find("select[name='Cli_Nro_Docu']");
		Cli_Nro_Docu.val(clientes.Cli_Nro_Docu);
	},
	showModal: function (accion,clientes) {
		var that = this;
		if(accion == 1) {
			// $(that.element).children(".clss-btn-clientes-save").show();
			// $(that.element).children(".clss-btn-clientes-update").hide();
			$("#dvtabla").hide();
			$("#dvformulario").show();
			// $("#dvformulario").css("display", "none");
			// $("#dvtabla").css("display", "block");
		}
		else if(accion == 2) {
			that.setAll(clientes);
			// $(that.element).children(".clss-btn-clientes-save").hide();
			// $(that.element).children(".clss-btn-clientes-update").show();
			$("#dvtabla").hide();
			$("#dvformulario").show();
		}
		// that.element.modal('show');
	},
	hideModal: function () {
		// var that = this;
		// var _link = $(that.element).find(".clss-a-clientes");
		// _link.click();
		$("#dvtabla").show();
		$("#dvformulario").hide();
	},
	reloadDataTable: function () {
		if($dtClientes) {
			$dtClientes.DataTable().ajax.reload();
		}
	}
};
$.Clientes.defaultOptions = {
};

/* function fnClientesDataTable(idTable) {
	$dtClientes = $('#'+idTable);
	$dtClientes.DataTable( {
		ajax: {
			url: MY_API_URL+'/clientes',
			type: 'GET',
			dataSrc: ''
		},
		columns: [
			{ data: 'Cli_Tipo_Persona_Texto' },
			{ data: 'Tdoc_Descripcion' },
			{ data: 'Cli_Nro_Docu' },
			{ data: 'Cli_Estado_Texto' },
			{
				data: null,
				"render": function ( data, type, full, meta ) {
					return '<center>'+
						'<button  type="button" class="btn btn-default btn-sm" onclick="javascript:$clientes.prepareUpdate(\''+full.Cli_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>'+
						'</button>'+
						'<span>&nbsp;&nbsp;&nbsp;</span>'+
						'<button  type="button" class="btn btn-danger btn-sm" onclick="javascript:$clientes.delete(\''+full.Cli_Codigo+'\');">'+
						'<span class="glyphicon glyphicon-edit" aria-hidden="true"> Borrar</span>'+
						'</button>'+
						'</center>';
				}
			}
		]
	});
} */
var $table; // = $('#table')
  var $remove; // = $('#remove')
  var selections = []

  function getIdSelections() {
    return $.map($table.bootstrapTable('getSelections'), function (row) {
      return row.id
    })
  }

  function responseHandler(res) {
    $.each(res.rows, function (i, row) {
      row.state = $.inArray(row.id, selections) !== -1
    })
    return res
  }

  function detailFormatter(index, row) {
    var html = []
    $.each(row, function (key, value) {
      html.push('<p><b>' + key + ':</b> ' + value + '</p>')
    })
    return html.join('')
  }

  function operateFormatter(value, row, index) {
    return [
      // '<a class="like" href="javascript:void(0)" title="Like">',
      // '<i class="fa fa-heart"></i>',
      // '</a>  |  ',
	  // javascript:$clientes.prepareUpdate(\''+full.Cli_Codigo+'\');
	  // '<a class="like" href="javascript:void(0)" title="Like">',
	  '<a class="like" href="javascript:$clientes.showModal(1,1)" title="Like">',
      '<i class="fa fa-edit"></i>',
      '</a>  |  ',
      '<a class="remove" href="javascript:void(0)" title="Remove">',
      '<i class="fa fa-trash"></i>',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      // alert('You click like action, row: ' + JSON.stringify(row))
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }

  function totalTextFormatter(data) {
    return 'Total'
  }

  function totalNameFormatter(data) {
    return data.length
  }

  function totalPriceFormatter(data) {
    var field = this.field
    return '$' + data.map(function (row) {
      return +row[field].substring(1)
    }).reduce(function (sum, i) {
      return sum + i
    }, 0)
  }

  function initTable() {
    $table.bootstrapTable('destroy').bootstrapTable({
      height: 550,
      locale: $('#locale').val(),
      columns: [
        /* [
		{
          field: 'state',
          checkbox: true,
          rowspan: 2,
          align: 'center',
          valign: 'middle'
        },
		{
          title: 'Item ID',
          field: 'id',
          rowspan: 2,
          align: 'center',
          valign: 'middle',
          sortable: true,
          footerFormatter: totalTextFormatter
        }, {
          title: 'Item Detail',
          colspan: 3,
          align: 'center'
        }],
        [{
          field: 'name',
          title: 'Item Name',
          sortable: true,
          footerFormatter: totalNameFormatter,
          align: 'center'
        }, {
          field: 'price',
          title: 'Item Price',
          sortable: true,
          align: 'center',
          footerFormatter: totalPriceFormatter
        }, {
          field: 'operate',
          title: 'Item Operate',
          align: 'center',
          events: window.operateEvents,
          formatter: operateFormatter
        }] */
		[
		{
          field: 'Cli_Tipo_Persona_Texto',
		  title: 'Tipo',
          // checkbox: true,
          // rowspan: 2,
          align: 'center',
          valign: 'middle'
        },
		{
          field: 'Tdoc_Descripcion',
		  title: 'Descripcion',
          // checkbox: true,
          // rowspan: 2,
          align: 'center',
          valign: 'middle'
        },
		{
          field: 'Cli_Nro_Docu',
		  title: 'Nro Documento',
          // checkbox: true,
          // rowspan: 2,
          align: 'center',
          valign: 'middle'
        },
		{
          field: 'Cli_Estado_Texto',
		  title: 'Estado',
          // checkbox: true,
          // rowspan: 2,
          align: 'center',
          valign: 'middle'
        },
		{
          field: 'operate',
          title: 'Operacion',
          align: 'center',
          events: window.operateEvents,
          formatter: operateFormatter
        }
		/* {
          field: 'Cli_Tipo_Persona_Texto',
          title: 'Item Name',
          sortable: true,
          footerFormatter: totalNameFormatter,
          align: 'center'
        }, {
          field: 'Cli_Nro_Docu',
          title: 'Item Price',
          sortable: true,
          align: 'center',
          footerFormatter: totalPriceFormatter
        }, {
          field: 'operate',
          title: 'Item Operate',
          align: 'center',
          events: window.operateEvents,
          formatter: operateFormatter
        } */
		]
      ]
    })
    $table.on('check.bs.table uncheck.bs.table ' +
      'check-all.bs.table uncheck-all.bs.table',
    function () {
      $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

      // save your data, here just save the current page
      selections = getIdSelections()
      // push or splice the selections if you want to save all data selections
    })
    $table.on('all.bs.table', function (e, name, args) {
      console.log(name, args)
    })
    $remove.click(function () {
      var ids = getIdSelections()
      $table.bootstrapTable('remove', {
        field: 'id',
        values: ids
      })
      $remove.prop('disabled', true)
    })
  }

  // $(function() {
    // initTable()

    // $('#locale').change(initTable)
  // })
/*  */

function fnClientesModalOpen(accion, clientes) {
	$clientes.showModal(accion, clientes);
}

var $dtClientes = null;
var $clientes = null;

function fnClientesInit() {
	$pais = new $.Pais(null);
	$departamento = new $.Departamento(null);
	$provincia = new $.Provincia(null);
	$distrito = new $.Distrito(null);
	$tipoDocumento = new $.TipoDocumento(null);
	$clientes = new $.Clientes($("#md_formulario_clientes"));
	$clientes.Init();
	// fnClientesDataTable('tb_tabla_clientes');
	$table = $('#table');
	$remove = $('#remove');
	initTable();
	// $('#locale').change(initTable);
}
