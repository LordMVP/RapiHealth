@extends('pagina.principal.principal')

@section('titulo', 'Registrar Usuarios')

@section('jss')
<script type="text/javascript">

	$(document).ready(function(){

		$("#ano").chosen({});
		$("#periodo").chosen({});

		var numero =document.getElementById("ano").value;
		var select_op = document.getElementById('periodo'); 

		select_op.options.length=0 

		var f = '{{ date("Y") }}';
		//alert(f);
		var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		//alert('{{ date("m") }}');
		if (numero == f){
			var aux = 1;
			for(i='{{ date("m") }}'-1; i<12; i++){
				select_op.options[i+1] = new Option(meses[i]+"-"+numero , meses[i]);    
				aux++;
			}
		}else{
			for(i=0;i<12;i++){
				select_op.options[i+1] = new Option(meses[i]+"-"+numero , meses[i]);  
			}
		}

		$('#periodo').prop('disabled', false).trigger("chosen:updated");

		
	});

	function fun_per(){

		var ano = document.getElementById("ano").value;
		var periodo = document.getElementById('periodo').value; 

		//alert(ano + ' - ' + periodo);
		$.ajax({
			type:"POST",
			url: "{{ asset('plugin/funcionalidad/ajax/validar_periodo_emple.php') }}",
			data: "periodo="+periodo+ "&ano="+ano
		}).done(function(msg){
			//alert(msg);
			if(msg == "error"){

				var valida ='<div class="col-lg-12">';
				valida +='<div class="alert alert-danger">';
				valida += '<strong>Error Periodo Existente! </strong>&nbsp;<span class="glyphicon glyphicon-warning-sign "> </span> ';
				valida += '</div></div>';
				$("#valida").html(valida);  
				document.getElementById('registrar').disabled=true;         

			}else{
				var valida ='<div class="col-lg-12">';
				valida +='<div class="alert alert-success">';
				valida += '<strong> Periodo de Liquidacion Valido! </strong> &nbsp;<span class="glyphicon glyphicon-ok "> </span>';
				valida += '</div></div>';
				$("#valida").html(valida); 
				document.getElementById('registrar').disabled=false;
			}

			$('#periodo').prop('disabled', false).trigger("chosen:updated");
		});
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
					<h3 class="page-header">Creacion Periodo Turnos</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 col-md-6">


					{!! Form::open(['route' => 'admin.periodo_turno.store', 'method' => 'POST', 'files' => true]) !!}

					<div class="form-group">
						{!! Form::label('ano', 'Año') !!}
						{!! Form::select('ano', [date("Y") => date("Y"), date("Y")+1 => date("Y")+1, date("Y")+2 => date("Y")+2, date("Y")+3 => date("Y")+3, date("Y")+4 => date("Y")+4], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Año', 'required', 'id' => 'ano', 'onchange' => '']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('periodo', 'Periodo') !!}
						{!! Form::select('periodo', ['1' => '1'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Periodo', 'required', 'id' => 'periodo', 'onchange' => 'fun_per()']) !!}
					</div>
					
					<div id ="valida" class="row">
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class' => 'btn btn-default', 'id' => 'registrar'])!!}
						{!! Form::reset('Limpiar', ['class' => 'btn btn-default'])!!}
						{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
					</div>

					{!! Form::close() !!}

					<hr>

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

		//$("#periodo").chosen({});
		//$("#ano").chosen({});

	</script>

	@endsection