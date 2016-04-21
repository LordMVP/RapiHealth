		<nav class="" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header ">
				@if (Auth::user())
				<a class="navbar-brand" href="{{ route('panel') }}">RapiHealth</a>
				@endif
			</div>

			<div class="sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">

						@if(Auth::user())

						@if(Auth::user()->tipo == 'administrador')
						<li>
							<a href="{{ route('admin.perfil.index') }}"><i class="fa fa-user-md"></i> Perfil</a>
						</li>
						<li>
							<a href="{{ route('admin.medicos.index') }}"><i class="fa fa-user-md"></i> Medicos</a>
						</li>
						<li>
							<a href="{{ route('admin.empleados.index') }}"><i class="fa fa-suitcase"></i> Empleados</a>
						</li>
						<li>
							<a href="{{ route('admin.pacientes.index') }}"><i class="fa fa-users"></i> Pacientes</a>
						</li>
						<li>
							<a href="{{ route('admin.especialidad.index') }}"><i class="fa fa-medkit"></i> Especialidad</a>
						</li>
						<li>
							<a href="{{ route('admin.turnos.index') }}"><i class="fa fa-calendar"></i> Turnos</a>
						</li>
						<li>
							<a href="{{ route('admin.citas.index') }}"><i class="fa fa-book"></i> Citas</a>
						</li>
						<li>
							<a href="{{ route('admin.usuarios.index') }}"><i class="fa fa-male"></i> Usuarios</a>
						</li>
						@endif

						@if(Auth::user()->tipo == 'medico')
						<li>
							<a href="{{ route('admin.perfil.index') }}"><i class="fa fa-user-md"></i> Perfil</a>
						</li>
						<li>
							<a href="{{ route('admin.citas.index') }}"><i class="fa fa-book"></i> Citas</a>
						</li>
						@endif

						@if(Auth::user()->tipo == 'paciente')
						<li>
							<a href="{{ route('admin.perfil.index') }}"><i class="fa fa-user-md"></i> Perfil</a>
						</li>
						<li>
							<a href="{{ route('admin.citas.index') }}"><i class="fa fa-book"></i> Citas</a>
						</li>
						@endif

						@if(Auth::user()->tipo == 'empleado')
						<li>
							<a href="{{ route('admin.perfil.index') }}"><i class="fa fa-user-md"></i> Perfil</a>
						</li>
						<li>
							<a href="{{ route('admin.turnos.index') }}"><i class="fa fa-calendar"></i> Turnos</a>
						</li>
						@endif

						@if(Auth::user()->tipo == 'jefe')
						<li>
							<a href="{{ route('admin.perfil.index') }}"><i class="fa fa-user-md"></i> Perfil</a>
						</li>
						<li>
							<a href="{{ route('admin.empleados.index') }}"><i class="fa fa-suitcase"></i> Empleados</a>
						</li>
						<li>
							<a href="{{ route('admin.pacientes.index') }}"><i class="fa fa-users"></i> Pacientes</a>
						</li>
						<li>
							<a href="{{ route('admin.turnos.index') }}"><i class="fa fa-calendar"></i> Turnos</a>
						</li>
						<li>
							<a href="{{ route('admin.citas.index') }}"><i class="fa fa-book"></i> Citas</a>
						</li>
						@endif

						@endif

					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>