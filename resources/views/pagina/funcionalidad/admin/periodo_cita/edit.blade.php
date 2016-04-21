@extends('pagina.principal.principal')

@section('titulo', 'Registrar Usuarios')

@section('jss')
<script type="text/javascript">

	$(document).ready(function(){
		

		var array_fechas = new Array(5);
		

		//alert(array_fechas);

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '<Ant',
			nextText: 'Sig>',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			dateFormat: 'yy/mm/dd',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);

		$(function () {
			$("#fecha").datepicker();
		});
		$fech = 0;
		$('#fechas_btn').hide();
		$('#fechas_btnn').hide();

		$("#fecha1").datepicker();
		$("#fecha2").datepicker();
		$("#fecha3").datepicker();
		$("#fecha4").datepicker();
		$("#fecha5").datepicker();

		$("#fecha1").hide();
		$("#fecha2").hide();
		$("#fecha3").hide();
		$("#fecha4").hide();
		$("#fecha5").hide();

		$("#lb_fecha1").hide();
		$("#lb_fecha2").hide();
		$("#lb_fecha3").hide();
		$("#lb_fecha4").hide();
		$("#lb_fecha5").hide();

		$("#fechas_btn").click(function(){
                //alert($fech);
                $fech++;
                if ($fech ==1){
                	$("#fecha1").slideToggle("3000");
                	$("#lb_fecha1").slideToggle("3000");
                }
                if ($fech ==2){
                	$("#fecha2").slideToggle("3000");
                	$("#lb_fecha2").slideToggle("3000");
                }
                if ($fech ==3){
                	$("#fecha3").slideToggle("3000");
                	$("#lb_fecha3").slideToggle("3000");
                }
                if ($fech ==4){
                	$("#fecha4").slideToggle("3000");
                	$("#lb_fecha4").slideToggle("3000");
                }
                if ($fech ==5){
                	$("#fecha5").slideToggle("3000");
                	$("#lb_fecha5").slideToggle("3000");
                }
                if($fech > 5){
                	$fech = 5;
                }

            });

		$("#fechas_btnn").click(function(){
			//alert($fech);
			
			if ($fech == 1){
				$("#fecha1").hide();
				$("#lb_fecha1").hide();
				$("#fecha1").val("");
			}
			if ($fech == 2){
				$("#fecha2").hide();
				$("#lb_fecha2").hide();
				$("#fecha2").val("");
			}
			if ($fech == 3){
				$("#fecha3").hide();
				$("#lb_fecha3").hide();
				$("#fecha3").val("");
			}
			if ($fech == 4){
				$("#fecha4").hide();
				$("#lb_fecha4").hide();
				$("#fecha4").val("");
			}
			if ($fech == 5){
				$("#fecha5").hide();
				$("#lb_fecha5").hide();
				$("#fecha5").val("");
			}
			if($fech < 1){
				$fech = 1;
			}
			$fech--;
		});

		$('#extra_si').click(function(){
			$('#fechas_btn').show();
			$('#fechas_btnn').show();
		});

		$('#extra_no').click(function(){
			$('#fechas_btn').hide();
			$('#fechas_btnn').hide();

			$("#fecha1").hide();
			$("#fecha2").hide();
			$("#fecha3").hide();
			$("#fecha4").hide();
			$("#fecha5").hide();

			$("#lb_fecha1").hide();
			$("#lb_fecha2").hide();
			$("#lb_fecha3").hide();
			$("#lb_fecha4").hide();
			$("#lb_fecha5").hide();

			$("#fecha1").val("");
			$("#fecha2").val("");
			$("#fecha3").val("");
			$("#fecha4").val("");
			$("#fecha5").val("");
			$fech = 0;
		});

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

		var estado = '{{ $periodo_aux->est_fecha }}';
		//alert(estado); //

		if(estado == 'Si'){

			array_fechas[0] = '{{ $periodo["fechas"][0] }}';
			array_fechas[1] = '{{ $periodo["fechas"][1] }}';
			array_fechas[2] = '{{ $periodo["fechas"][2] }}';
			array_fechas[3] = '{{ $periodo["fechas"][3] }}';
			array_fechas[4] = '{{ $periodo["fechas"][4] }}';

			for(var i = 0; i < 5; i++){
				if(array_fechas[i] != ""){
					var au = i + 1;
					$("#lb_fecha" + au).show();
					$("#fecha" + au).show();
					$("#fecha" + au).val(array_fechas[i]);
					$('#fechas_btn').show();
					$('#fechas_btnn').show();
					$("#extra_si").attr('checked', true);
					$fech = au;
				}
			}
		}else{

		}


	});

function fun_ano(){
		//alert('hola');

		//$("#periodo").chosen({});
		//$("#ano").chosen({});

	}

	function fun_per(){

		var ano = document.getElementById("ano").value;
		var periodo = document.getElementById('periodo').value; 

		//alert(ano + ' - ' + periodo);
		$.ajax({
			type:"POST",
			url: "{{ asset('plugin/funcionalidad/ajax/validar_periodo_citas.php') }}",
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

<div class="funcionalidad" >

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')

		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Modificacion Periodo Citas | {{ $periodo['ano'] . ' - ' . $periodo['periodo'] }}</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 col-md-6">

					{!! Form::open(['route' => ['admin.periodo_cita.update', $periodo_aux], 'method' => 'PUT', 'files' => true]) !!}

					<div class="form-group">
						{!! Form::label('ano', 'Año') !!}
						{!! Form::select('ano', [date("Y") => date("Y"), date("Y")+1 => date("Y")+1, date("Y")+2 => date("Y")+2, date("Y")+3 => date("Y")+3, date("Y")+4 => date("Y")+4], $periodo['ano'], ['class' => 'form-control', 'placeholder' => 'Seleccione Año', 'required', 'id' => 'ano', 'onchange' => 'fun_ano()', 'onclick' => 'fun_ano()']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('periodo', 'Periodo') !!}
						{!! Form::select('periodo', ['', ''], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Periodo', 'required', 'id' => 'periodo', 'onchange' => 'fun_per()']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('fechas', 'Fechas Extra Para No Asignacion De Citas?') !!}
					</div>

					<div class="form-group">
						{!! Form::label('si', 'Si') !!}
						{!! Form::radio('extra', 'Si', false, ['class' => '', 'id' => 'extra_si']) !!}

						{!! Form::label('no', 'No') !!}
						{!! Form::radio('extra', 'No', true, ['class' => '', 'id' => 'extra_no']) !!}
					</div>

					<div class="form-group">

						{!! Form::button('+ Añadir', ['class' => 'btn btn-xs btn-default', 'id' => 'fechas_btn', 'name' => 'fechas_btn']) !!}

						{!! Form::button('- Quitar', ['class' => 'btn btn-xs btn-default', 'id' => 'fechas_btnn', 'name' => 'fechas_btnn']) !!}

					</div>

					<div class="form-group" id="campos">

						{!! Form::label('lb_fecha1', 'Fecha 1', ['class' => '', 'id' => 'lb_fecha1']) !!}
						{!! Form::date('fecha1', null, ['class' => 'form-control', 'id' => 'fecha1', 'name' => 'fecha1']) !!}

						{!! Form::label('lb_fecha2', 'Fecha 2', ['class' => '', 'id' => 'lb_fecha2']) !!}
						{!! Form::date('fecha2', null, ['class' => 'form-control', 'id' => 'fecha2', 'name' => 'fecha2']) !!}

						{!! Form::label('lb_fecha3', 'Fecha 3', ['class' => '', 'id' => 'lb_fecha3']) !!}
						{!! Form::date('fecha3', null, ['class' => 'form-control', 'id' => 'fecha3', 'name' => 'fecha3']) !!}

						{!! Form::label('lb_fecha4', 'Fecha 4', ['class' => '', 'id' => 'lb_fecha4']) !!}
						{!! Form::date('fecha4', null, ['class' => 'form-control', 'id' => 'fecha4', 'name' => 'fecha4']) !!}

						{!! Form::label('lb_fecha5', 'Fecha 5', ['class' => '', 'id' => 'lb_fecha5']) !!}
						{!! Form::date('fecha5', null, ['class' => 'form-control', 'id' => 'fecha5', 'name' => 'fecha5']) !!}


					</div>

					<div id ="valida" class="row">
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class' => 'btn btn-default', 'id' => 'registrar'])!!}
						{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
					</div>

					{!! Form::close() !!}

					<hr>

					@else
					
					{{ header('Location: route("error.pagina")') }}

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