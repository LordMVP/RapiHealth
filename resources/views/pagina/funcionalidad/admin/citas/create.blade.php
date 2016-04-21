@extends('pagina.principal.principal')

@section('titulo', 'Registrar Usuarios')

@section('jss')

<script type="text/javascript" src=" {{ asset('plugin/funcionalidad/assets/js/js-citas.js') }}"></script>
<script type="text/javascript">
	//alert('hola');
	
	$(document).ready(function(){
		/*$('#asignacion_muestra').show();
		$('#asignacion').hide();*/
		$('#asignacion_muestra').hide();
		$('#asignacion').show();
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
		$("#fecha_cita").datepicker();


		$("#medico").chosen({});
		

		$("#nombre").change(function(){
			var cedula = $("#nombre").val();
			$("#cedula").val(cedula);
		});

		$("#especialidad").change(function(){

			var especialidad = document.getElementById("especialidad").value;

			$.ajax({
				type:"POST",
				url: "{{ asset('plugin/funcionalidad/ajax/medico_especialidad.php') }}",
				data: "especialidad="+especialidad
			}).done(function(data){
				
				var medicos = $.parseJSON(data);

				$("#medico").empty();

				//alert(medicos.length);

				for (var i = 0; i < medicos.length; i++) {
					$("#medico").append("<option value='" + medicos[i]['id'] + "'>" + medicos[i]['nombre'] + ' ' + medicos[i]['apellido'] + "</option>");
				}

				$("#medico").chosen({
					search_contains: true,
					no_results_text: 'No Se Encontraron Resultados'
				});

				$('#medico').prop('disabled', false).trigger("chosen:updated");
			});
		});
	});

function mostrar () {

	//alert('hola');
	$('#asignacion_muestra').hide();
	$('#asignacion').show();

	//$('#nom_paciente').val('hola');


	//alert(id);
	/*$("#cedula").val(cedula);
	$("#especialidad").val(especialidad);*/
}
</script>
@endsection

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')

		@if (Auth::user())


		<div id="page-wrapper" >
			<div id="asignacion" >

				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header">Asignacion De Citas</h3>
					</div>
				</div>
				<!-- /.row --> 
				{!! Form::open(['route' => 'admin.citas.store', 'method' => 'POST', 'files' => true, 'id' => 'frm_filtro']) !!}

				<div class="row">
					<div class="col-lg-3">

						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title text-center">Datos Paciente</h3>
							</div>

							<div class="panel-body">

								@if (Auth::user()->tipo == "paciente")
								<div class="form-group">
									{!! Form::label('nombre', 'Nombre Paciente') !!}
									{!! Form::select('nombre', $aux_pacientes, Auth::user()->id, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre', 'id' => 'nombre', 'name' => 'nombre', 'disabled']) !!}
								</div>
								<div class="form-group">
									{!! Form::label('cedula', 'Cedula') !!}
									{!! Form::text('cedula', Auth::user()->id, ['class' => 'form-control', 'id' => 'cedula', 'name' => 'cedula', 'placeholder' => 'Cedula', 'readonly' => 'readonly']) !!}
								</div>
								@else
								<div class="form-group">
									{!! Form::label('nombre', 'Nombre Paciente') !!}
									{!! Form::select('nombre', $aux_pacientes, null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre', 'id' => 'nombre', 'name' => 'nombre']) !!}
								</div>
								<div class="form-group">
									{!! Form::label('cedula', 'Cedula') !!}
									{!! Form::text('cedula', null, ['class' => 'form-control', 'id' => 'cedula', 'name' => 'cedula', 'placeholder' => 'Cedula', 'readonly' => 'readonly']) !!}
								</div>
								@endif
								
							</div>
						</div>  
					</div> 
					<div class="col-lg-9">
						<div class="row">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title">Informacion Cita Medica</h3>
								</div>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													{!! Form::label('cita', 'Tipo De Cita') !!}
													{!! Form::select('especialidad', $especialidades, null, ['class' => 'form-control', 'required', 'placeholder' => 'Cita', 'id' => 'especialidad', 'name' => 'especialidad']) !!}
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group">
													{!! Form::label('medico', 'Medico') !!}
													{!! Form::select('medico', [], null, ['class' => 'form-control', 'required', 'placeholder' => 'Medico Especialista', 'id' => 'medico', 'name' => 'medico']) !!}
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-16">

												<div class="col-lg-9">
													<div id="content">
														<div class="filtro">

															{!! Form::label('mes', 'Mes') !!}
															{!! Form::select('periodo', $aux_periodo, null, ['class' => 'form-control', 'required', 'placeholder' => 'Cita', 'id' => 'periodo', 'name' => 'periodo', 'style' => 'width:140px;display:inline;', 'onchange' => 'filtrar()', 'onclick' => 'filtrar()']) !!}
															{!! Form::label('', '') !!}
															{!! Form::label('fecha_cita', 'Fecha Cita') !!}
															{!! Form::text('fecha_cita', null, ['class' => 'form-control', 'id' => 'fecha_cita', 'name' => 'fecha_cita', 'placeholder' => 'Fecha', 'style' => 'width:200px;display:inline; padding-right: 20px;']) !!}
															{!! Form::button('', ['class' => 'btn btn-metis-6 btn-sm btn-grad glyphicon glyphicon-search', 'id' => 'btnfiltrar', 'name' => 'btnfiltrar'])!!}
															{!! Form::button('', ['class' => 'btn btn-success btn-sm btn-grad glyphicon glyphicon-list', 'id' => 'btncancel', 'name' => 'btncancel'])!!}
														</div>        
													</div> 
												</div>

												<div class="row">
													<div class="col-lg-12">
														<h1></h1>
													</div> 
												</div> 

												<div class="col-lg-13">
													<div class="panel panel-default">
														<div class="panel-heading text-center	">
															<h3 class="panel-title">Listado Citas</h3>
														</div>
														<div class="table-responsive">
															<div class="tableContainer">
																<table id="data" cellspacing="0" class="table table-bordered table-hover table-striped">
																	<thead>
																		<tr>
																			<th>Dia</th>
																			<th>Fecha</th>
																			<th>Hora</th>
																			<th>Estado</th>
																			<th>Acciones</th>
																		</tr>  

																	</thead>

																	<tbody>

																	</tbody>

																	<tfoot>
																		<tr>
																			<th>Dia</th>
																			<th>Fecha</th>
																			<th>Hora</th>
																			<th>Estado</th>
																			<th>Acciones</th>
																		</tr>  

																	</tfoot>

																</table>

															</div>
														</div>
													</div>        
												</div> 

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div> <!--  asignacion -->

			

			<div id="asignacion_muestra">
				
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header text-center">Informacion Cita Medica</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						
						<ul class="media-list">
							<hr>	
							<li class="media">
								<div class="media-left">
									<a href="#">
										<img id="img_paciente" class="media-object" src="" alt="..." height="130px" width="130px">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Paciente</h4>
									<h5 id="id_paciente" name="id_paciente"> Cedula </h5>
									<h5 id="nom_paciente" name="nom_paciente"> Nombre </h5>
									<h5 id="email_paciente" name="email_paciente"> Email </h5>
									<h5 id="tel_paciente" name="tel_paciente"> Telefono </h5>
								</div>
							</li>
							<hr>
							<li class="media">
								<div class="media-left">
									<a href="#">
										<img id="img_medico" class="media-object" src="" alt="..." height="130px" width="130px">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Medico</h4>
									<h5 id="id_medico" name="id_medico"> Cedula </h5>
									<h5 id="nom_medico" name="nom_medico"> Nombre </h5>
									<h5 id="email_medico" name="email_medico"> Email </h5>
									<h5 id="tel_medico" name="tel_medico"> Telefono </h5>
								</div>
							</li>
							<hr>
						</ul>
						
					</div> 
					<div class="col-lg-7">
						<hr>
						<div class="well">
							<h4 class="text-center">Informacion General</h4>
							{!! Form::hidden('hora', null, ['class' => 'form-control', 'id' => 'hora', 'name' => 'hora', 'placeholder' => 'Fecha', 'style' => 'width:200px;display:inline; padding-right: 20px;']) !!}
							{!! Form::hidden('fecha', null, ['class' => 'form-control', 'id' => 'fecha', 'name' => 'fecha', 'placeholder' => 'Fecha', 'style' => 'width:200px;display:inline; padding-right: 20px;']) !!}
							<div class="row">
								<div class="col-lg-6">
									<strong>Especialidad</strong>
								</div>
								<div class="col-lg-4">
									<span id="cita_especialidad">Especialidad</span>
								</div>							
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<strong>Fecha</strong>
								</div>
								<div class="col-lg-4">
									<span id="cita_fecha">Fecha</span>
								</div>							
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<strong>Hora</strong>
								</div>
								<div class="col-lg-4">
									<span id="cita_hora">Hora</span>
								</div>							
							</div>
							<br>
							<div class="row text-center">
								<div class="col-lg-12">
									<div class="alert alert-warning">
										<strong>Cuidado!</strong> Verifique Los Datos Antes De Guardar La Asignacion De La Cita.
									</div>		
								</div>					
							</div>
						</div>

						<hr>
					</div>
				</div>
				<div class="row text-right">
					<div class="form-group">
						{!! Form::submit('Aceptar', ['class' => 'btn btn-default'])!!}
						{!! Form::button('Volver', ['class' => 'btn btn-default', 'onclick' => 'mostrar()'])!!}
					</div> 
				</div>
				<hr>
			</div> <!--  Asignacion Muestra -->

			<br>
			{!! Form::close() !!}		
		</div> 
		<hr>
	</div>

	@else

	<script type="text/javascript">
		window.location="{{ route('error.pagina') }}";
	</script>

	@endif


</div>
</div>
</div>

@endsection





@section('js')

<script type="text/javascript">

	$("#nombre").chosen({
		search_contains: true,
		no_results_text: 'No Se Encontraron Resultados'
	});

	$("#especialidad").chosen({
		search_contains: true,
		no_results_text: 'No Se Encontraron Resultados'
	});

	$("#periodo").chosen({
		search_contains: true,
		no_results_text: 'No Se Encontraron Resultados'
	});

</script>

@endsection