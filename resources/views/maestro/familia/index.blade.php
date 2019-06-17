@extends('layout')
@section('css')
<link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<style>
	table tbody tr td{
		height: 5px !important;
		padding: 0px !important;
	}
</style>
@endsection

@section('content')

<div class="row clearfix" style="margin-top: -20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="padding: 5px;">
                         <span style="margin-left: 10px"><strong>Familia</strong></span>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <select class="form-control input-sm">
                                        <option value="">-- Grupo --</option>
                                        <option value="10">A</option>
                                        <option value="20">B</option>
                                        <option value="30">C</option>
                                        <option value="40">D</option>
                                        <option value="50">E</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control input-sm">
                                        <option value="">-- Clase --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <select class="form-control input-sm">
                                        <option value="">-- Familia --</option>
                                        <option value="10">A10aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</option>
                                        <option value="10">A10aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</option>
                                        <option value="10">A10aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</option>
                                        <option value="10">A10aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
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

                     	<a href="{{ MY_APP_URL }}/maestro/familia/create" type="button" class="btn bg-blue waves-effect btn-sm" data-toggle="tooltip" data-placement="bottom" title="Nuevo">
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

     <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -20px">
                    <div class="card">
                       
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Familia</th>
                                            <th>Grupo</th>
                                            <th>Clase</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                            <td>2010/10/14</td>
                                            <td>$327,900</td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                            <td>2009/09/15</td>
                                            <td>$205,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                            <td>2008/12/13</td>
                                            <td>$103,600</td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
                                            <td>$90,560</td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
                                            <td>$342,000</td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                            <td>2008/10/16</td>
                                            <td>$470,600</td>
                                        </tr>
                                        <tr>
                                            <td>Haley Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
                                            <td>$313,500</td>
                                        </tr>
                                        <tr>
                                            <td>Tatyana Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>19</td>
                                            <td>2010/03/17</td>
                                            <td>$385,750</td>
                                        </tr>
                                       
                                       
                                     
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('js')
	<!-- tabla-jquery -->
	<!-- <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script> -->
    <!-- <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script> -->
    <script src="{{asset('js/pages/ui/tooltips-popovers.js')}}"></script>
    @endsection