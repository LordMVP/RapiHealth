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
					<h3 class="page-header">Informacion {{ Auth::user2()->tipo }} </h3>
				</div>
			</div>

			<div class="row">
				<div class="well">
					<h4 class="text-center">Informacion Personal</h4>
					
					<div class="row">
						<div class="col-xs-5 col-md-2">
							<a href="#" class="thumbnail">
								
								<img src="{{ asset('plugin/imagenes/' . Auth::user()->imagen) }}" >	
							</a>
						</div>
						<div class="col-xs-4 col-md-1">
							<!-- Informacion Personal-->
							<strong>Nombre</strong><br><br>
							<strong>Apellido</strong><br><br>
							<strong>Direccion</strong>
						</div>
						<div class="col-xs-4 col-md-3">
							<span id=""> {{ Auth::user()->nombre }} </span><br><br>
							<span id=""> {{ Auth::user()->apellido }} </span><br><br>
							<span id=""> {{ Auth::user()->direccion }} </span>
						</div>	
						<div class="col-xs-4 col-md-1">
							<strong>Telefono</strong><br><br>
							<strong>Email</strong><br>
						</div>	
						<div class="col-xs-5 col-md-3">
							<span id=""> @if({{ Auth::user() }} @else Auth::user()->telefono ) </span><br><br>
							<span id=""> {{ Auth::user()->email }} </span><br>
						</div>
						<br><br><br><br><br><br><br><br>
						&nbsp;&nbsp;&nbsp; 
						@if (Auth::user()->tipo == "medico")
						<a title="Editar" href=" {{ route('admin.medicos.edit', Auth::user()->id . '_1') }} " class="text-right glyphicon glyphicon-pencil btn btn-info"></a>
						@else
						<a title="Editar" href=" {{ route('admin.usuarios.edit', Auth::user()->id . '_1') }} " class="text-right glyphicon glyphicon-pencil btn btn-info"></a>
						@endif	
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
				if(userestado->())
				alert("Error usuario n encotrado ");	
				else
				alert("Usuario encontrado ");	
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