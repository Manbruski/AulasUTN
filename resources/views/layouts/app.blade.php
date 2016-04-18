<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Aulas UTN</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Animation library for notifications   -->
  <link href="/assets/css/animate.min.css" rel="stylesheet"/>
  <!--  Light Bootstrap Table core CSS    -->
  <link href="/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  @yield('css')
</head>
<body id="app-layout">
  <div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="/assets/img/sidebar.jpg">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="{{ url('/home') }}" class="simple-text">Aulas UTN</a>
        </div>
        <ul class="nav">
          <?php $perfil = Auth::user()->perfil; ?>
          @if ($perfil->nombre === 'Administrador' && $perfil->id === 1)
          <li>
            <a href="/aulas"><i class="pe-7s-user"></i><p>Aulas</p></a>
          </li>
          <li>
            <a href="/cursos"><i class="pe-7s-user"></i><p>Cursos</p></a>
          </li>
          <li>
            <a href="/carreras"><i class="pe-7s-user"></i><p>Carreras</p></a>
          </li>
          <li>
            <a href="/perfiles"><i class="pe-7s-id"></i><p>Perfiles</p></a>
          </li>
          <li>
            <a href="/periodos"><i class="pe-7s-date"></i><p>Periodos</p></a>
          </li>
          <li>
            <a href="/usuarios"><i class="pe-7s-users"></i><p>Usuarios</p></a>
          </li>
          <li>
            <a href="/sedes"><i class="pe-7s-map-marker"></i><p>Sedes</p></a>
          </li>
          <li>
            <a href="/horarios"><i class="pe-7s-clock"></i><p>Horarios</p></a>
          </li>
          <li>
            <a href="/reservaciones"><i class="pe-7s-date"></i><p>Reservaciones</p></a>
          </li>
          @else
          <li>
            <a href="/reservaciones"><i class="pe-7s-date"></i><p>Reservaciones</p></a>
          </li>
          <li>
            <a href='/usuarios/{{{Auth::user()->id}}}/actualizar'><i class="pe-7s-users"></i><p>Perfil</p></a>
          </li>
          @endif

        </ul>

      </div>
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ url('/logout') }}">Salir</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <p class="copyright pull-right">Aulas UTN &copy; 2016</p>
        </div>
      </footer>
    </div>
  </div>
</body>
<!--   Core JS Files   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="/assets/js/bootstrap-checkbox-radio-switch.js"></script>
<!--  Charts Plugin -->
<script src="/assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="/assets/js/light-bootstrap-dashboard.js"></script>
@yield('scripts')
</html>
