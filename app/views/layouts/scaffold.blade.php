<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		
        <title>Turty System Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ HTML::style('css/normalize.css') }}
        
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-theme.min.css') }}
        {{ HTML::style('css/bootstrap-responsive.min.css') }}
        {{ HTML::style('css/offcanvas.css') }}

        {{ HTML::style('css/main.css') }}

        @yield('add_css')
		
	</head>

	<body>
<div class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}">Turty System</a>
        </div>
        <div class="collapse navbar-collapse">
        @if(Auth::check())
          <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/') }}">Inicio</a></li>
                <li><a href="{{ URL::to('admin') }}">Admin</a></li>
                <li><a href="{{ URL::to('distribuidor') }}">Distribuidor</a></li>
                <li><a href="{{ URL::to('entrega') }}">Entrega</a></li>
                <li><a href="{{ URL::to('orden-compra') }}">Orden de Compra</a></li>
                <li><a href="{{ URL::to('orden-compra') }}">Stock</a></li>
                <li class="dropdown">
                	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuracion <b class="caret"></b></a>
                	<ul class="dropdown-menu">
                		<li><a href="{{ URL::to('statuses') }}">Status</a></li>
                        <li><a href="{{ URL::to('tipo_productos') }}">Tipo Productos</a></li>
                        <li><a href="{{ URL::to('vigencia') }}">Dias Vigencia</a></li>
                	</ul>
                </li>
                <li><a href="{{ URL::to('usuario/logout') }}">Cerrar Sesion</a></li>
          </ul>
        @endif
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
		<div class="container">

     
			@if (Session::has('message'))
				<div class="alert alert-warning">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>

	  {{ HTML::script('js/jquery.js') }}
	  {{ HTML::script('js/bootstrap.min.js') }}
	  @yield('add_script')
	</body>

</html>
