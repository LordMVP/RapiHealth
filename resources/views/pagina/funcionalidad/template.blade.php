@extends('pagina.principal.principal')

@section('titulo', 'Login')


@section('contenido')


{!! Form::open(['route' => 'pagina.login', 'method' => 'POST']) !!}

<div class="contact">
	<div class="container">
		<div class="work-title">
			<h3>Login<span></span></h3>
		</div>
		<div class="contact-infom">

			<div class="contact-form">
				{!! Form::label('email', 'Email') !!}
				<br>
				{!! Form::text('email', null, ['class' => '', 'placeholder' => 'Email', 'required']) !!}
				<br>
				{!! Form::label('password', 'Password') !!}
				<br>
				{!! Form::password('password', null, ['class' => '', 'placeholder' => '**********', 'required']) !!}
				<br>
				{!! Form::submit('Login', ['class' => 'btn btn-default btn-lg']) !!}
			</div>

		</div>
	</div>
</div>
{!! Form::close() !!}

@endsection

