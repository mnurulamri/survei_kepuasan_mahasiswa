<?php
//function base_url(){
    //return 'https://ppf.fisip.ui.ac.id/backend/';
    //return 'https://localhost/backend/';
//}
//$base_url = 'aplikasi.test';
//var_dump($this->session->userdata());
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengaduan Kerusakan Fasilitas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/AdminLTE/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../assets/AdminLTE/dist/css/skins/skin-yellow.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>O</b>PF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OPF&nbsp;</b>FISIP UI</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-togglex" data-toggle="dropdownx">
              <!-- The user image in the navbar
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?=$this->session->userdata['logged_pengaduan']['cn_pengaduan']?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- Sidebar user panel -->
      <div class="user-panel">
        <?php if($this->session->userdata['logged_pengaduan']['hak_akses_pengaduan'] == '1') { ?>
          <div class="" style="padding-left:30px">
              <a href="<?=base_url()?>autentikasi/set_role" style="color:gold; font-style:italic; font-size:13px;"><b>
                <span style="border:1px solid gold">&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;Role&nbsp;&nbsp;</span>
                <span style="border:1px solid gold;background:gold;color:#000">&nbsp;<?=$this->session->userdata['logged_pengaduan']['role_name_pengaduan']?>&nbsp;&nbsp;</span></b>
              </a>
          </div>
          <?php } else { ?>
              <a href="#" style="color:gold; font-style:italic; font-size:13px; cursor: none;"><b>
                <span style="border:1px solid gold">&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;Role&nbsp;&nbsp;</span>
                <span style="border:1px solid gold;background:gold;color:#000">&nbsp;<?=$this->session->userdata['logged_pengaduan']['role_name_pengaduan']?>&nbsp;&nbsp;</span></b>
              </a>
          <?php } 
          
          ?>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links         
        <li class="menu-link">-->
        <?php
        if($this->session->userdata['logged_pengaduan']['role_name_pengaduan']=='Pelapor'){
          $path_data_pengaduan = 'pelapor';
        } else if($this->session->userdata['logged_pengaduan']['role_name_pengaduan']=='Koordinator'){
          $path_data_pengaduan = 'koordinator';
        } else if($this->session->userdata['logged_pengaduan']['role_name_pengaduan']=='Petugas'){
          $path_data_pengaduan = 'petugas';
        }
        ?>
        <li class="active">
            <a href="dashboard"><i class="fa fa-link"></i><span>Dashboard</span></a>
        </li>
        <li>
            <a href="<?=$path_data_pengaduan?>"><i class="fa fa-link"></i><span>Data Pengaduan</span></a>
        </li> 
        <?php
        if($this->session->userdata['logged_pengaduan']['role_name_pengaduan']=='Petugas' || $this->session->userdata['logged_pengaduan']['role_name_pengaduan']=='Koordinator'){
        ?>
        <!--
        <li>
          <a href="laporan"><i class="fa fa-link"></i> <span>Laporan</span></a>
        </li>
        <li>
          <a href="grafik"><i class="fa fa-link"></i> <span>Grafik</span></a>
        </li>
        
        <li class="treeview menu-link">
          <a href="#" class=""><i class="fa fa-link"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
        -->
        <?php } ?>
        
        <li>
            <a href="autentikasi/logout"><i class="fa fa-link"></i><span>Logout</span></a>
        </li> 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kerusakan Fasilitas
        <small>Daftar Pengaduan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
