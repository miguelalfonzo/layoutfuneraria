@extends('layout')
@section('css')
<link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection
@section('content')
<div class="row clearfix" style="margin-top: -20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="padding: 5px;">
                         <a href="{{ MY_APP_URL }}/maestro/familia"><span style="margin-left: 10px"><strong>Familia</strong></span></a> / <small>Nueva Familia</small>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                            	<div class="col-sm-6">
                            	<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Codigo"/>
                                        </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control input-sm">
                                        <option value="">-- Grupo --</option>
                                        <option value="10">A</option>
                                        <option value="20">B</option>
                                        <option value="30">C</option>
                                        <option value="40">D</option>
                                        <option value="50">E</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control input-sm">
                                        <option value="">-- Clase --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                            	<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Descripcion" />
                                        </div>
                                </div>
                                </div>
                               
                                <div class="col-sm-6">
                                    <select class="form-control input-sm">
                                        <option value="">-- Estado --</option>
                                        <option value="10">Activo</option>
                                        <option value="20">Inactivo</option>
                              
                                    </select>
                                </div>

                            </div>

                       
                        </div>
                        <div class="text-center" style="padding-bottom: 12px;margin-top: -20px">
                        <a type="button" class="btn bg-pink waves-effect btn-sm" data-toggle="tooltip" data-placement="bottom" title="Buscar">
                         		<i class="material-icons" style="font-size: 15px">search</i>
                         		
                     	</a>

                     	<a type="button" class="btn bg-blue waves-effect btn-sm" data-toggle="tooltip" data-placement="bottom" title="Nuevo">
                                    <i class="material-icons" style="font-size: 15px">assignment</i>
                               
                        </a>

                        <a type="button" class="btn bg-green waves-effect btn-sm" data-toggle="tooltip" data-placement="bottom" title="Exportar a Excel">
                                    <i class="material-icons" style="font-size: 15px">input</i>
                                    
                        </a>

                        <a type="button" class="btn bg-red waves-effect btn-sm" data-toggle="tooltip" data-placement="bottom" title="Imprimir">
                                    <i class="material-icons" style="font-size: 15px">print</i>
                                   
                        </a>

                        <a type="button" class="btn bg-purple waves-effect btn-sm" data-toggle="tooltip" data-placement="bottom" title="Limpiar">
                                    <i class="material-icons" style="font-size: 15px">clear</i>
                                    
                        </a>
                    	</div>
                    </div>
                     
                </div>

    </div>
@endsection


@section('js')
<script src="{{asset('js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{asset('js/pages/ui/tooltips-popovers.js')}}"></script>
@endsection