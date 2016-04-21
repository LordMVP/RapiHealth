@extends('pagina.principal.principal')

@section('titulo', 'Usuarios')

@section('jss')
<script type="text/javascript">

	function cargarcita(id){

		data = eval(id);

		//console.log(data);


		var header = '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
		header += '<h3 class="modal-title" id="myModalLabel" style="color:Black;"> Cita Medica - ' + data['periodo'] + ' - ' + data['ano'] + ' </h3>';
		$("#modalheader").html(header);

		var c_hora=document.getElementById("cita_hora");
		c_hora.innerHTML = data['hora'];

		var c_fecha=document.getElementById("cita_fecha");
		c_fecha.innerHTML = data['fecha'];

		var id_paciente=document.getElementById("id_paciente");
		id_paciente.innerHTML= data['cedula_paciente'];

		var nombre_paciente=document.getElementById("nom_paciente");
		nombre_paciente.innerHTML= data['nombre_p'] + ' ' + data['apellido_p'];

		var email_paciente=document.getElementById("email_paciente");
		email_paciente.innerHTML= data['email_p'];

		var telefono_paciente=document.getElementById("tel_paciente");
		telefono_paciente.innerHTML= data['telefono_p'];

		document.getElementById('img_paciente').src='../../plugin/imagenes/'+ data['imagen_p'];;

		var id_medico=document.getElementById("id_medico");
		id_medico.innerHTML = data['cedula_medico'];

		var nombre_medico=document.getElementById("nom_medico");
		nombre_medico.innerHTML =  data['nombre_m'] + ' ' + data['apellido_m'];

		var email_medico=document.getElementById("email_medico");
		email_medico.innerHTML= data['email_m'];

		var telefono_medico=document.getElementById("tel_medico");
		telefono_medico.innerHTML= data['telefono_m'];

		document.getElementById('img_medico').src='../../plugin/imagenes/'+ data['imagen_m'];

		var especialidad=document.getElementById("cita_especialidad");
		especialidad.innerHTML = data['especialidad']

		var especialidad=document.getElementById("cita_estado");
		especialidad.innerHTML = data['estado']
		
		//$("#mostrarcita").html('pdf');
		/*}
		);*/
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
					<h3 class="page-header">Listado Citas</h3>
				</div>
			</div>
			<div class="text-right">
				@if(Auth::user()->tipo == "administrador" || Auth::user()->tipo == "jefe")
				<a href=" {{ route('admin.periodo_cita.index') }} " class="btn btn-info"> Periodo</a>
				<a href=" {{ route('admin.citas.create') }} " class="btn btn-info"> Cita</a>
				@elseif(Auth::user()->tipo == "paciente")
				<a href=" {{ route('admin.citas.create') }} " class="btn btn-info"> Cita</a>
				@endif
			</div>

			<!-- <a href=" {{ route('admin.turnos.create') }} " class="btn btn-info"> Crear Turnos</a> -->
			<hr>		
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- /.panel-heading -->
						<div class="table-responsive panel-body">
							<div class="tableContainerdataTable_wrapper">

								<table id="data" cellspacing="0" class="table table-bordered table-hover table-striped" id="dataTables-example">
									<thead>
										<tr>
											<th>ID</th>
											<th>Periodo</th>
											<th>Paciente</th>
											<th>Medico</th>
											<th>Fecha</th>
											<th>Hora</th>
											<th>Estado</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tbody>

										@if(Auth::user()->tipo == "medico")

										@foreach ($citas as $cita)

										@if(Auth::user()->id == $cita->cedula_medico)
										<tr class="odd gradeX">
											<td>{{ $cita->id }}</td>
											<td>{{ $cita->periodo . '-' . $cita->ano }}</td>
											<td>{{ $cita->nombre_p . ' ' . $cita->apellido_p }}</td>
											<td>{{ $cita->nombre_m . ' ' . $cita->apellido_m }}</td>
											<td>{{ $cita->fecha }}</td>
											<td>{{ $cita->hora }}</td>
											<td>{{ $cita->estado }}</td>
											<td>
												<div class="text-center">

													<a title="Ver" id="verpdf" name="verpdf" class="glyphicon glyphicon-eye-open btn btn-primary" onclick="cargarcita({{ $cita }})" data-toggle="modal" ACTIVE href="#modalcita" data-original-title="" data-placement="bottom"></a>
													<a title="Atender" href=" {{ route('admin.citas.atender', $cita->id) }} " class="glyphicon glyphicon-export btn btn-success"></a>
													
												</div>

											</td>
										</tr>
										@endif
										@endforeach
										
										@elseif(Auth::user()->tipo == "administrador" || Auth::user()->tipo == "jefe")

										@foreach ($citas as $cita)
										<tr class="odd gradeX">
											<td>{{ $cita->id }}</td>
											<td>{{ $cita->periodo . '-' . $cita->ano }}</td>
											<td>{{ $cita->nombre_p . ' ' . $cita->apellido_p }}</td>
											<td>{{ $cita->nombre_m . ' ' . $cita->apellido_m }}</td>
											<td>{{ $cita->fecha }}</td>
											<td>{{ $cita->hora }}</td>
											<td>{{ $cita->estado }}</td>
											<td>
												<div class="text-center">

													<a title="Ver" id="verpdf" name="verpdf" class="glyphicon glyphicon-eye-open btn btn-primary" onclick="cargarcita({{ $cita }})" data-toggle="modal" ACTIVE href="#modalcita" data-original-title="" data-placement="bottom"></a>
													@if(Auth::user()->tipo != "jefe")
													<a title="Atender" href=" {{ route('admin.citas.atender', $cita->id) }} " class="glyphicon glyphicon-export btn btn-success"></a>
													@endif
													@if(Auth::user()->tipo != "medico")
													<a title="Editar" href=" {{ route('admin.citas.edit', $cita->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
													<a title="Eliminar" href=" {{ route('admin.citas.destroy', $cita->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
													@endif
												</div>


											</td>
										</tr>
										@endforeach

										@elseif(Auth::user()->tipo == "paciente")

										@foreach ($citas as $cita)
										<tr class="odd gradeX">
											<td>{{ $cita->id }}</td>
											<td>{{ $cita->periodo . '-' . $cita->ano }}</td>
											<td>{{ $cita->nombre_p . ' ' . $cita->apellido_p }}</td>
											<td>{{ $cita->nombre_m . ' ' . $cita->apellido_m }}</td>
											<td>{{ $cita->fecha }}</td>
											<td>{{ $cita->hora }}</td>
											<td>{{ $cita->estado }}</td>
											<td>
												<div class="text-center">

													<a title="Ver" id="verpdf" name="verpdf" class="glyphicon glyphicon-eye-open btn btn-primary" onclick="cargarcita({{ $cita }})" data-toggle="modal" ACTIVE href="#modalcita" data-original-title="" data-placement="bottom"></a>
													@if(Auth::user()->id == $cita->cedula_paciente)
													<a title="Editar" href=" {{ route('admin.citas.edit', $cita->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
													@else
													<a title="Editar" href=" {{ route('admin.citas.edit', $cita->id) }} " class="glyphicon glyphicon-pencil btn btn-info disabled"></a>
													@endif
												</div>


											</td>
										</tr>
										@endforeach

										@endif
										
									</tbody>
								</table>
								{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
							</div>
							<div class="text-left">
								{!! $citas->render() !!}
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
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

	<!--modalplaca-->
	<div class="modal fade" id="modalcita" name="modalcita">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" id="modalheader">

				</div>
				<div class="modal-body" style="color:Black;" id="mostrarcita">
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
								<div class="row">
									<div class="col-lg-6">
										<strong>Estado</strong>
									</div>
									<div class="col-lg-4">
										<span id="cita_estado">Estado</span>
									</div>							
								</div>
								<br>
							</div>

							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>  
	<!--modal-->

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