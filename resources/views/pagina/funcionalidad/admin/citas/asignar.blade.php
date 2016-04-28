@extends('pagina.principal.principal')

@section('titulo', 'Registrar Usuarios')

@section('jss')
<script type="text/javascript">

	function fun_ano(){
		//alert('hola');
		//Citas FTW
		var numero =document.getElementById("periodo").value;
		var select_op = document.getElementById('periodo'); 

		select_op.options.length=0 

		var f = '{{ date("Y") }}';
		//alert(f);
		var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		//alert('{{ date("m") }}');
		/*if (numero == f){
			var aux = 1;
			for(i='{{ date("m") }}'-1; i<12; i++){
				select_op.options[i+1] = new Option(meses[i]+"-"+numero , meses[i]);    
				aux++;
			}
		}else{*/
			for(i=0;i<12;i++){
				select_op.options[i+1] = new Option(meses[i] , meses[i]);  
			}
		//}

		//$("#periodo").chosen({});
		//$("#ano").chosen({});

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
					<h3 class="page-header">Asignacion De Turnos</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 col-md-6">

					{!! Form::open(['route' => 'admin.turnos.store', 'method' => 'POST', 'files' => true]) !!}

					<div class="form-group">
						{!! Form::label('periodo', 'Periodo') !!}
						<select class="form-control" onmousemove="seleccion()" name="periodo" id="periodo" disabled="">
							<option value"{{ $periodos['id'] }}">{{ $periodos['periodo'] . '-' . $periodos['ano'] }}</option>
						</select>

					</div>

					<div class="form-group">
						{!! Form::hidden('id',  $periodos['id'],  ['class' => '']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('archivo', 'Archivo') !!}
						{!! Form::file('archivo', ['class' => '', 'accept' => 'pdf']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class' => 'btn btn-default', 'id' => 'registrar'])!!}

						{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}

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
