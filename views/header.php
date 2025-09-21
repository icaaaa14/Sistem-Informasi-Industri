<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pageTitle; ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  
  <!-- FontAwesome 4.3.0 -->
  <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />

  <!-- Ionicons 2.0.0 -->
  <link href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
  
  <!-- Theme style -->
  <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
  
  <!-- AdminLTE Skins -->
  <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

  <style>
    .error {
      color: red;
      font-weight: normal;
    }

    /* Custom skin color */
    .skin-custom .main-header .logo {
      background-color: #4a9b6e; /* Logo background color */
      color: #000; /* Logo text color */
    }
    .skin-custom .main-header .navbar {
      background-color: #5cb281; /* Header background color */
      color: #000; /* Header text color */
    }
    .skin-custom .main-sidebar {
      background-color: #5cb281; /* Sidebar background color */
      color: #000; /* Sidebar text color */
    }
    .skin-custom .sidebar-menu > li > a {
      color: #000; /* Sidebar menu text color */
    }
    .sidebar-toggle {
      color: black;
      background-color: transparent;
    }
    .sidebar-toggle .fa {
      color: black; /* Sidebar toggle icon color */
    }
    .sidebar-toggle:hover {
      background-color: #f5f5f5;
    }
    .dropdown-toggle {
      color: black;
      background-color: transparent;
    }
    .dropdown-toggle .fa {
      color: black; /* Dropdown toggle icon color */
    }
    
    /* Custom Button Styles */
    .btn-secondary {
      background-color: transparent;
    }

    .btn-secondary:hover {
      background-color: #f5f5f5;
      border-color: #ddd;
    }
  </style>

  <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>

  <script type="text/javascript">
    var baseURL = "<?php echo base_url(); ?>";
  </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-custom sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url('dashboard'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <img src="<?php echo base_url('assets/image/logo.png'); ?>" alt="Disperdagin" style="height: 50px;">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
          <img src="<?php echo base_url('assets/image/logo.png'); ?>" alt="Disperdagin" style="height: 50px;"> <b>Disperdagin</b>
        </span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Logout button -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-toggle="modal" data-target="#logoutModal" style="color: black;">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
      </nav>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin keluar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="<?php echo site_url('Header/logout'); ?>" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <!-- Sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li>
            <a href="<?php echo site_url('dashboard'); ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('data_perusahaan'); ?>">
              <i class="fa fa-folder-open"></i>
              <span>Data Industri</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('monitoring'); ?>">
              <i class="fa fa-list"></i>
              <span>Monitoring</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('dokumentasi'); ?>">
              <i class="fa fa-file"></i>
              <span>Dokumentasi</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('data_admin'); ?>">
              <i class="fa fa-users"></i>
              <span>Data Admin</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('visimisi'); ?>">
              <i class="fa fa-edit"></i>
              <span>Visi Misi</span>
            </a>
          </li>
        </ul>
      </section>
    </aside>
