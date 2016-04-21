@extends('pagina.principal.principal')

@section('titulo', 'Registrar Usuarios')

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')
		
		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Registro Usuarios</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-10 col-md-6">

					@if(count($errors) > 0)
					<div class="alert alert-danger" role="alert">
						@foreach ($errors->all() as $error) 
						<li>{{ $error }}</li>
						@endforeach
					</div>
					@endif

					{!! Form::open(['route' => 'admin.usuarios.store', 'method' => 'POST', 'files' => true]) !!}

					<div class="form-group">
						{!! Form::label('cedula', 'Cedula *') !!}
						{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required', 'pattern' => '[0-9]{8,30}', 'title' => 'La Cedula Solo Debe Contener Numeros y tener una longitud minima de 8 Digitos']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('nombre', 'Nombre *') !!}
						{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required', 'pattern' => '[A-Za-z]{3,120}', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('apellido', 'Apellido *') !!}
						{!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required', 'pattern' => '[A-Za-z.Ññ]{3,120}', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('genero', 'Genero *') !!}
						{!! Form::select('genero', ['masculino' => 'Masculino', 'femenino' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Genero', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('direccion', 'Direccion') !!}
						{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Cra 8 No 20 - 10']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('telefono', 'Telefono') !!}
						{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '325698785']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('email', 'Email *') !!}
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'title' => 'El Email Debe De Tener el Formato example@example.com']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('password', 'Contraseña *') !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required', 'pattern' => "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}", 'title' => 'Debe contener al menos un número y una mayúscula y minúscula, y al menos 8 o más caracteres']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('tipo', 'Nivel De Usuario *') !!}
						{!! Form::select('tipo', ['administrador' => 'Administrador', 'empleado' => 'Empleado', 'jefe' => 'Jefe', 'paciente' => 'Paciente'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Nivel De Usuario', 'required', 'id' => 'tipo']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('imagen', 'Imagen') !!}
						{!! Form::file('imagen', ['class' => '']) !!}
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

<script type="text/javascript">

	$("#tipo").chosen({});

</script>

@endsection