<!DOCTYPE html>
<html lang="es">
<head>
	
	<title> @yield('titulo', 'Default') | RapiHealth </title>

	@include('pagina.principal.head')
	@yield('jss')

</head>

<body>
	
	<!-- Incliur el nav -->

	@include('pagina.principal.nav')
	
	<div class="text-center">
		@include('flash::message')
	</div>
	

	@yield('contenido')


	@include('pagina.principal.footer')

</body>

<!-- Daña el nav
<script src="{{ asset('plugin/funcionalidad/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
-->

<script src="{{ asset('plugin/funcionalidad/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{ asset('plugin/funcionalidad/bower_components/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('plugin/funcionalidad/bower_components/morrisjs/morris.min.js') }}"></script>
<script src="{{ asset('plugin/funcionalidad/js/morris-data.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('plugin/funcionalidad/dist/js/sb-admin-2.js') }}"></script>

@yield('js')

</html>	
