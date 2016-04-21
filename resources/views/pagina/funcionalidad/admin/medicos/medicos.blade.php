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
					<h3 class="page-header">Listado Medicos</h3>
				</div>
			</div>
			<a href=" {{ route('admin.medicos.create') }} " class="btn btn-info"> Registrar Medico</a>
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
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Direccion</th>
											<th>Telefono</th>
											<th>Email</th>
											<th>Especialidad</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($users as $user)
										<tr class="odd gradeX">
											<td>{{ $user->id }}</td>
											<td>{{ $user->nombre }}</td>
											<td>{{ $user->apellido }}</td>
											<td>{{ $user->direccion }}</td>
											<td>{{ $user->telefono }}</td>
											<td>{{ $user->email }}</td>
											<td>
												@foreach ($user->especialidad as $especialidad)
												{{ '| ' . $especialidad->nombre  }}
												@endforeach
											</td>
											<td>
												<a href=" {{ route('admin.medicos.edit', $user->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
												<a href=" {{ route('admin.medicos.destroy', $user->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="text-left">
								{!! $users->render() !!}
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