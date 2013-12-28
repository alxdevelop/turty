<!DOCTYPE html>
<html lang="en">
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

    	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Turty System</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/') }}">Inicio</a></li>
                <li><a href="{{ URL::to('admin') }}">Admin</a></li>
                <li><a href="{{ URL::to('distribuidor') }}">Distribuidor</a></li>
                <li><a href="{{ URL::to('catalogo') }}">Catalogo</a></li>
                <li><a href="#">Mensajes</a></li>
                <li><a href="#">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    	<div class="container">
    		@yield('content')
    	</div><!-- .container -->


	  {{ HTML::script('js/jquery.js') }}
	  {{ HTML::script('js/underscore-min.js') }}
	  {{ HTML::script('js/backbone-min.js') }}
	  {{ HTML::script('js/bootstrap.min.js') }}
	  @yield('add_script')
    </body>
</html>
