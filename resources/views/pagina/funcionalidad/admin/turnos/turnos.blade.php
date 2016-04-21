@extends('pagina.principal.principal')

@section('titulo', 'Usuarios')

@section('jss')
<script type="text/javascript">

	function cargarpdf(id){


		//alert(id);
		$.ajax({
			type:"POST",
			url: "{{ asset('plugin/funcionalidad/ajax/turnos_asignados.php') }}",
			data: "id="+id
		}).done(function(data){

			data = JSON.parse(data);
			//alert(data[0]['ruta']);

			var header = '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			header += '<h3 class="modal-title" id="myModalLabel" style="color:Black;"> Turnos De ' + data[0]['periodo'] + ' - '+ data[0]['ano'] + ' </h3>';

			if(data[0]['ruta'] == null){
				var pdf = '<div class="alert alert-warning" role="alert">No Se Ha Asignado Turnos Para El Periodo De ' + data[0]['periodo'] + ' - '+ data[0]['ano'] + '</div>'
			}else{
				var ruta = '{{ asset("") }}';
				ruta += data[0]['ruta'];
				//alert(ruta);
				var pdf = '<embed id="cargapdf" name="cargapdf" src="' + ruta + '" type="" width="100%" height="500">';
			}
			
			$("#modalheader").html(header);
			$("#mostrarpdf").html(pdf);
		}
		);
	}

</script>

@endsection

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')

		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Listado Turnos</h3>
				</div>
			</div>
			<div class="text-right">
				@if (Auth::user()->tipo != "empleado")
				<a href=" {{ route('admin.periodo_turno.create') }} " class="btn btn-info"> Periodo</a>
				@endif
			</div>

			<!-- <a href=" {{ route('admin.turnos.create') }} " class="btn btn-info"> Crear Turnos</a> -->
			<hr>		
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>ID</th>
											<th>Periodo</th>
											<th>Estado</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($turnos as $turno)

										@if (Auth::user()->tipo == "empleado" && $turno->estado == "Asignado")
										<tr class="odd gradeX">
											<td>
												<div class="text-center">
													{{ $turno->id }}
												</div>
											</td>
											<td>{{ $turno->periodo . '-' . $turno->ano }}</td>
											<td>{{ $turno->estado }}</td>
											<td>
												<div class="text-center">
													<a title="Ver" id="verpdf" name="verpdf" class="glyphicon glyphicon-eye-open btn btn-primary" onclick="cargarpdf({{ $turno->id_aux }})" data-toggle="modal" ACTIVE href="#modalpdf" data-original-title="fondo Empleados" data-placement="bottom"></a>
												</div>
											</td>
										</tr>
										@elseif(Auth::user()->tipo == "administrador" || Auth::user()->tipo == "jefe")
										<tr class="odd gradeX">
											<td>
												<div class="text-center">
													{{ $turno->id }}
												</div>
											</td>
											<td>{{ $turno->periodo . '-' . $turno->ano }}</td>
											<td>{{ $turno->estado }}</td>
											<td>
												<div class="text-center">

													<a title="Ver" id="verpdf" name="verpdf" class="glyphicon glyphicon-eye-open btn btn-primary" onclick="cargarpdf({{ $turno->id_aux }})" data-toggle="modal" ACTIVE href="#modalpdf" data-original-title="fondo Empleados" data-placement="bottom"></a>

													<a title="Asignar" href=" {{ route('admin.turnos.asignar', $turno->id) }} " class="glyphicon glyphicon-paperclip btn btn-success"></a>
													<a title="Editar" href=" {{ route('admin.turnos.edit', $turno->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
													<a title="Eliminar" href=" {{ route('admin.turnos.destroy', $turno->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
												</div>


											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
							</div>
							<div class="text-left">
								{!! $turnos->render() !!}
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			@else

			<div class="blog">
				<div class="container">
					<div class="blog-text">
						<h1>401</h1>
						<p>OPPS No tiene Los Permisos Para Acceder A esta Pagina</p> 
						<a href="/" >Regresar</a>
						<span> </span>
					</div>
				</div>
			</div>

			@endif

		</div>
	</div>

	<!--modalplaca-->
	<div class="modal fade" id="modalpdf" name="modalpdf">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" id="modalheader">

				</div>
				<div class="modal-body" style="color:Black;" id="mostrarpdf">

				</div>
			</div>
		</div>

	</div>  
	<!--modal-->

	@endsection





	@section('js')

	<script src="{{ asset('plugin/funcionalidad/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

	<!-- Morris Charts JavaScript -->
	<script src="{{ asset('plugin/funcionalidad/bower_components/raphael/raphael-min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/bower_components/morrisjs/morris.min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/js/morris-data.js') }}"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{ asset('plugin/funcionalidad/dist/js/sb-admin-2.js') }}"></script>

	@endsection