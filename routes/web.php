<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Autor. SYLAR.JM */

Route::get('/', function () {
    return redirect('app/login');
});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::group(['prefix' => 'login'], function () {
		Route::post('in', 'LoginController@login');
		Route::post('out', 'LoginController@logout');
	});

	Route::get('catalogo-bienes', 'CatalogoBienesController@listMany');
	Route::get('catalogo-bienes/{Art_Codigo}', 'CatalogoBienesController@showOne');
	Route::post('catalogo-bienes', 'CatalogoBienesController@addOne');
	Route::put('catalogo-bienes/{Art_Codigo}', 'CatalogoBienesController@editOne');
	Route::delete('catalogo-bienes/{Art_Codigo}', 'CatalogoBienesController@delOne');

	Route::get('clase', 'ClaseController@listMany');
	Route::get('clase/{Cla_Codigo}', 'ClaseController@showOne');
	Route::post('clase', 'ClaseController@addOne');
	Route::put('clase/{Cla_Codigo}', 'ClaseController@editOne');
	Route::delete('clase/{Cla_Codigo}', 'ClaseController@delOne');

	Route::get('clientes', 'ClientesController@listMany');
	Route::get('clientes/{Cli_Codigo}', 'ClientesController@showOne');
	Route::post('clientes', 'ClientesController@addOne');
	Route::put('clientes/{Cli_Codigo}', 'ClientesController@editOne');
	Route::delete('clientes/{Cli_Codigo}', 'ClientesController@delOne');

	Route::get('departamento', 'DepartamentoController@listMany');
	Route::get('departamento/{Dep_Codigo}', 'DepartamentoController@showOne');
	Route::post('departamento', 'DepartamentoController@addOne');
	Route::put('departamento/{Dep_Codigo}', 'DepartamentoController@editOne');
	Route::delete('departamento/{Dep_Codigo}', 'DepartamentoController@delOne');

	Route::get('distrito', 'DistritoController@listMany');
	Route::get('distrito/{Dist_Codigo}', 'DistritoController@showOne');
	Route::post('distrito', 'DistritoController@addOne');
	Route::put('distrito/{Dist_Codigo}', 'DistritoController@editOne');
	Route::delete('distrito/{Dist_Codigo}', 'DistritoController@delOne');

	Route::get('familia', 'FamiliaController@listMany');
	Route::get('familia/{Fam_Codigo}', 'FamiliaController@showOne');
	Route::post('familia', 'FamiliaController@addOne');
	Route::put('familia/{Fam_Codigo}', 'FamiliaController@editOne');
	Route::delete('familia/{Fam_Codigo}', 'FamiliaController@delOne');

	Route::get('grupo', 'GrupoController@listMany');
	Route::get('grupo/{Gru_Codigo}', 'GrupoController@showOne');
	Route::post('grupo', 'GrupoController@addOne');
	Route::put('grupo/{Gru_Codigo}', 'GrupoController@editOne');
	Route::delete('grupo/{Gru_Codigo}', 'GrupoController@delOne');

	Route::get('pais', 'PaisController@listMany');
	Route::get('pais/{Pais_Codigo}', 'PaisController@showOne');
	Route::post('pais', 'PaisController@addOne');
	Route::put('pais/{Pais_Codigo}', 'PaisController@editOne');
	Route::delete('pais/{Pais_Codigo}', 'PaisController@delOne');

	Route::get('persona', 'PersonaController@listMany');
	Route::get('persona/{Per_Codigo}', 'PersonaController@showOne');
	Route::post('persona', 'PersonaController@addOne');
	Route::put('persona/{Per_Codigo}', 'PersonaController@editOne');
	Route::delete('persona/{Per_Codigo}', 'PersonaController@delOne');

	Route::get('proveedores', 'ProveedoresController@listMany');
	Route::get('proveedores/{Prov_Codigo}', 'ProveedoresController@showOne');
	Route::post('proveedores', 'ProveedoresController@addOne');
	Route::put('proveedores/{Prov_Codigo}', 'ProveedoresController@editOne');
	Route::delete('proveedores/{Prov_Codigo}', 'ProveedoresController@delOne');

	Route::get('provincia', 'ProvinciaController@listMany');
	Route::get('provincia/{Prov_Codigo}', 'ProvinciaController@showOne');
	Route::post('provincia', 'ProvinciaController@addOne');
	Route::put('provincia/{Prov_Codigo}', 'ProvinciaController@editOne');
	Route::delete('provincia/{Prov_Codigo}', 'ProvinciaController@delOne');

	Route::get('rol', 'RolController@listMany');
	Route::get('rol/{Rol_Codigo}', 'RolController@showOne');
	Route::post('rol', 'RolController@addOne');
	Route::put('rol/{Rol_Codigo}', 'RolController@editOne');
	Route::delete('rol/{Rol_Codigo}', 'RolController@delOne');

	Route::get('tipo', 'TipoController@listMany');

	Route::get('tipo-bienes', 'TipoBienesController@listMany');
	Route::get('tipo-bienes/{TBien_Codigo}', 'TipoBienesController@showOne');
	Route::post('tipo-bienes', 'TipoBienesController@addOne');
	Route::put('tipo-bienes/{TBien_Codigo}', 'TipoBienesController@editOne');
	Route::delete('tipo-bienes/{TBien_Codigo}', 'TipoBienesController@delOne');

	Route::get('tipo-documento', 'TipoDocumentoController@listMany');
	Route::get('tipo-documento/{Tdoc_Codigo}', 'TipoDocumentoController@showOne');
	Route::post('tipo-documento', 'TipoDocumentoController@addOne');
	Route::put('tipo-documento/{Tdoc_Codigo}', 'TipoDocumentoController@editOne');
	Route::delete('tipo-documento/{Tdoc_Codigo}', 'TipoDocumentoController@delOne');

	Route::get('unidad-medida', 'UnidadMedidaController@listMany');
	Route::get('unidad-medida/{UMed_Codigo}', 'UnidadMedidaController@showOne');
	Route::post('unidad-medida', 'UnidadMedidaController@addOne');
	Route::put('unidad-medida/{UMed_Codigo}', 'UnidadMedidaController@editOne');
	Route::delete('unidad-medida/{UMed_Codigo}', 'UnidadMedidaController@delOne');

	Route::get('usuario', 'UsuarioController@listMany');
	Route::get('usuario/{Usu_Codigo}', 'UsuarioController@showOne');
	Route::post('usuario', 'UsuarioController@addOne');
	Route::put('usuario/{Usu_Codigo}', 'UsuarioController@editOne');
	Route::delete('usuario/{Usu_Codigo}', 'UsuarioController@delOne');
});

Route::group(['prefix' => 'app', 'namespace' => 'App'], function () {
    Route::get('login', 'LoginController@index');
	Route::get('home', 'HomeController@index');
	
	Route::group(['prefix' => 'maestro', 'namespace' => 'Maestro'], function () {
		Route::get('catalogo-bienes', 'CatalogoBienesController@index');
		Route::get('clase', 'ClaseController@index');
		Route::get('clientes', 'ClientesController@index');
		Route::get('departamento', 'DepartamentoController@index');
		Route::get('distrito', 'DistritoController@index');
		Route::get('familia', 'FamiliaController@index');
		Route::get('grupo', 'GrupoController@index');
		Route::get('pais', 'PaisController@index');
		Route::get('persona', 'PersonaController@index');
		Route::get('proveedores', 'ProveedoresController@index');
		Route::get('provincia', 'ProvinciaController@index');
		Route::get('rol', 'RolController@index');
		Route::get('tipo-bienes', 'TipoBienesController@index');
		Route::get('tipo-documento', 'TipoDocumentoController@index');
		Route::get('unidad-medida', 'UnidadMedidaController@index');
		Route::get('usuario', 'UsuarioController@index');

		Route::get('perfiles', 'PerfilController@index');
	});
});
