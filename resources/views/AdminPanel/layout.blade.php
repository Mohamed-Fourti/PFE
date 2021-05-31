<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@lang('Administration')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
  <!-- Datatable style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>


  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>



  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light navcolorc" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">      
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" id="navAdmin"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">@lang('Accueil')</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <form action="{{ route('logout') }}" method="POST" hidden>
          @csrf                                
        </form>
        <a class="nav-link"
            href="{{ route('logout') }}"
            onclick="event.preventDefault(); this.previousElementSibling.submit();" id="navAdmin">
            @lang('Déconnexion')
        </a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <div id="imgDep"><img src="../images/depti.jpg" /></div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @foreach(config('menu') as $name => $elements)
          @isset($elements['children'])
                      <li class="nav-item has-treeview {{ menuOpen($elements['children']) }}">
                          <a href="#" class="nav-link {{ currentChildActive($elements['children']) }}">
                              <i class="nav-icon fas fa-{{ $elements['icon'] }}"></i>
                              <p>
                                  @lang($name)
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              @foreach($elements['children'] as $child)
                                      <x-AdminPanel.menu-item 
                                          :route="$child['route']" 
                                          :sub=true>
                                          @lang($child['name'])
                                      </x-AdminPanel.menu-item>
                              @endforeach
                          </ul>
                      </li>
                  @else
                      <x-AdminPanel.menu-item 
                          :route="$elements['route']" 
                          :icon="$elements['icon']">
                          @lang($name)
                      </x-AdminPanel.menu-item>
                  @endisset
              
          @endforeach

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">@lang($title)</h3>
    </div>
    <div class="col-md-6 col-4 align-self-center">

    </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card border-primary">
      <div class="card-body">

        @yield('main')
        </div></div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>&copy; 2021 ISET Djerba.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>
<!-- Bootstrap File input-->
<link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/fileinput.js') }}" ></script>
<script src="{{ asset('js/fr.js') }}" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>

<script src="{{ asset('DataTables/datatables.min.js') }}" defer></script>
@stack('scripts')
@yield('js')
</body>
</html>
