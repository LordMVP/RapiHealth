@extends('pagina.principal.principal')

@section('titulo', 'Atender')

@section('jss')

@endsection

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')

		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Cita Medica</h3>
				</div>
			</div>

			<div class="row">
				<div class="well">
					<h4 class="text-center">Informacion Paciente</h4>
					<div class="row">
						<div class="col-xs-5 col-md-2">
							<a href="#" class="thumbnail">
								
								<img src="{{ asset('plugin/imagenes/' . $cita->imagen_p) }}" >	
							</a>
						</div>
						<div class="col-xs-4 col-md-1">
							<strong>Nombre</strong><br><br>
							<strong>Apellido</strong><br><br>
							<strong>Direccion</strong>
						</div>
						<div class="col-xs-4 col-md-3">
							<span id=""> {{ $cita->nombre_p }} </span><br><br>
							<span id=""> {{ $cita->apellido_p }} </span><br><br>
							<span id=""> {{ $cita->direccion_p }} </span>
						</div>	
						<div class="col-xs-4 col-md-1">
							<strong>Telefono</strong><br><br>
							<strong>Email</strong><br>
						</div>	
						<div class="col-xs-5 col-md-3">
							<span id=""> {{ $cita->telefono_p }} </span><br><br>
							<span id=""> {{ $cita->email_p }} </span><br>
						</div>							
					</div>


				</div>
			</div>	
			<hr>	
			<div class="row">
				<div class="col-lg-12">

				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			@else

			<script type="text/javascript">
				window.location="{{ route('error.pagina') }}";
			</script>

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