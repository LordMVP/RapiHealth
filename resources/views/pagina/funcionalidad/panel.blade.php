@extends('pagina.principal.principal')

@section('titulo', 'Panel')


@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')

		@if (Auth::user())
		
		@if(Auth::user()->tipo != "administrador")
		<script type="text/javascript"> window.location="{{ route('admin.perfil.index') }}" </script>
		@else

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Rapihealth - Panel {{ Auth::user()->tipo }}</h3>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-user-md fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div><h3>Medicos</h3></div>
								</div>
							</div>
						</div>
						<a href="{{ route('admin.medicos.index') }}">
							<div class="panel-footer">
								<span class="pull-left">Detalles!</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-users fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div><h3>Pacientes</h3></div>
								</div>
							</div>
						</div>
						<a href="{{ route('admin.pacientes.index') }}">
							<div class="panel-footer">
								<span class="pull-left">Detalles!</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-suitcase fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div><h3>Empleados</h3></div>
								</div>
							</div>
						</div>
						<a href="{{ route('admin.empleados.index') }}">
							<div class="panel-footer">
								<span class="pull-left">Detalles!</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-calendar fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div><h3>Turnos</h3></div>
								</div>
							</div>
						</div>
						<a href="{{ route('admin.turnos.index') }}">
							<div class="panel-footer">
								<span class="pull-left">Detalles!</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="panel panel-white">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-book fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div><h3>Citas</h3></div>
								</div>
							</div>
						</div>
						<a href="{{ route('admin.citas.index') }}">
							<div class="panel-footer">
								<span class="pull-left">Detalles!</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-male fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div><h3>Usuarios</h3></div>
								</div>
							</div>
						</div>
						<a href="{{ route('admin.usuarios.index') }}">
							<div class="panel-footer">
								<span class="pull-left">Detalles!</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>

		</div>
		<!-- /#page-wrapper -->
		@endif

		@else
		
		<script type="text/javascript">
			window.location="{{ route('error.pagina') }}";
		</script>

		@endif


	</div>
	<!-- /#wrapper -->
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