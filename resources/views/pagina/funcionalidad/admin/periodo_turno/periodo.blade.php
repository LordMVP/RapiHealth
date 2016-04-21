@extends('pagina.principal.principal')

@section('titulo', 'Usuarios')

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')
		
		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Listado Periodos</h3>
				</div>
			</div>
			
			<div class="text-right">
				<a href=" {{ route('admin.periodo_turno.create') }} " class="btn btn-info">Crear Periodo</a>
				<a href=" {{ route('admin.turnos.index') }} " class="btn btn-info">Turnos</a>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-10">
					<div class="panel panel-default">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>ID</th>
											<th>Periodo</th>
											<th>Año</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($p_turnos as $p_turno)
										<tr class="odd gradeX">
											<td>{{ $p_turno->id }}</td>
											<td>{{ $p_turno->periodo }}</td>
											<td>{{ $p_turno->ano }}</td>
											<td>
												<div class="text-center">
													<a title="Asignar" href=" {{ route('admin.turnos.asignar', $p_turno->id) }} " class="glyphicon glyphicon-paperclip btn btn-success"></a>
													<a title="Editar" href=" {{ route('admin.periodo_turno.edit', $p_turno->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
													<a title="Borrar" href=" {{ route('admin.periodo_turno.destroy', $p_turno->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
							</div>
							<div class="text-left">
								{!! $p_turnos->render() !!}
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