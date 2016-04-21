
<!--header-->
<div class="header">
	<div class="container">
		<div class="top-middle">
			<a href="/">
				<h3>RapiHealth</h3>
			</a>	
		</div>
		<div class="top-nav">
			<span class="menu"><img src="{{ asset('plugin/principal/images/menu-icon.png') }}" alt=""/></span>		
			<ul class="nav1">
				<li><a href="{{ route('index') }}" class="active">Inicio</a></li>
				<li><a href="{{ route('funciones') }}">Funciones</a></li>
				<li><a href="{{ route('servicios') }}">Servicios</a></li>
				<li><a href="{{ route('empresa') }}">Nuestra Empresa</a></li>
				<li><a href="{{ route('contactanos') }}" >Contactanos</a></li>

				@if(Auth::user())
				<li class="dropdown active">
					@if(Auth::user()->tipo == "administrador")
					<a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('panel') }}">
						@else
						<a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('admin.perfil.index') }}">
							@endif
							<i class="fa fa-user fa-fw"></i> {{ Auth::user()->nombre }} <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							@if(Auth::user()->tipo == "administrador")
							<li><a href="{{ route('panel') }}"><i class="fa fa-gear fa-fw"></i> Panel</a>
							</li>
							@else
							<li><a href="{{ route('admin.perfil.index') }}"><i class="fa fa-gear fa-fw"></i> Panel</a>
							</li>
							@endif
							<li class="divider"></li>
							<li><a href="{{ route('pagina.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>
					</li>
					@else
					<li><a href="{{ route('pagina.login') }}" >Login</a></li>
					@endif

				</ul>


			</div>	
			<div class="clearfix"> </div>
		</div>	
	</div>
	<!--//header-->