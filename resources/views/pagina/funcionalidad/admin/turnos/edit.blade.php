@extends('pagina.principal.principal')

@section('titulo', 'Editar Usuario')

@section('jss')

<script type="text/javascript">

	function fun_ano(){
		//alert('hola');

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

		//$("#periodo").chosen({});
		//$("#ano").chosen({});

	}

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
					<h3 class="page-header">Editar Periodo Turno- {!! $periodo->periodo . ' ' . $periodo->ano !!}</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-10 col-md-6">

					{!! Form::open(['route' => ['admin.turnos.update', $periodo], 'method' => 'PUT', 'files' => true]) !!}

					<div class="form-group">
						{!! Form::label('ano', 'Año') !!}
						{!! Form::select('ano', [date("Y") => date("Y"), date("Y")+1 => date("Y")+1, date("Y")+2 => date("Y")+2, date("Y")+3 => date("Y")+3, date("Y")+4 => date("Y")+4], $periodo->ano, ['class' => 'form-control', 'placeholder' => 'Seleccione Año', 'required', 'id' => 'ano', 'onchange' => 'fun_ano()', 'onclick' => 'fun_ano()'], $periodo->ano) !!}
					</div>

					<div class="form-group">
						{!! Form::label('periodo', 'Periodo') !!}
						{!! Form::select('periodo', ['1' => '1'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Periodo', 'required', 'id' => 'periodo', 'onchange' => 'fun_per()']) !!}
					</div>
					
					<div id ="valida" class="row">
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class' => 'btn btn-default', 'id' => 'registrar'])!!}
						{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
					</div>

					{!! Form::close() !!}

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