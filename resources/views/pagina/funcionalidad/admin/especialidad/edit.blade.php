@extends('pagina.principal.principal')

@section('titulo', 'Editar Usuario')

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')
		
		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Editar Especialidad - {!! $especialidad->nombre !!}</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-10 col-md-6">

					{!! Form::open(['route' => ['admin.especialidad.update', $especialidad], 'method' => 'PUT', 'files' => true]) !!}

					<div class="form-group">
						{!! Form::label('nombre', 'Especialidad') !!}
						{!! Form::text('nombre', $especialidad->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre De La Especialidad', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
						{!! Form::reset('Limpiar', ['class' => 'btn btn-default'])!!}
					</div>

					{!! Form::close() !!}

					<br><br>
					<hr>
				</div>
			</div>	


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