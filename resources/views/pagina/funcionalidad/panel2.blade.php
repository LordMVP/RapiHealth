@extends('pagina.principal.principal')

@section('titulo', 'Login')

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')
		
		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Rapihealth - Panel {{ Auth::user()->tipo }}</h3>
				</div>
				<!-- /.col-lg-12 -->
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
		
		<!--<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
			<li><a href="#profile" data-toggle="tab">Profile</a></li>
			<li class="disabled"><a>Disabled</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					Dropdown <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#dropdown1" data-toggle="tab">Action</a></li>
					<li class="divider"></li>
					<li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
				</ul>
			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="home">
				<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
			</div>
			<div class="tab-pane fade" id="profile">
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
			</div>
			<div class="tab-pane fade" id="dropdown1">
				<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
			</div>
			<div class="tab-pane fade" id="dropdown2">
				<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
			</div>
		</div>-->

		@endif

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