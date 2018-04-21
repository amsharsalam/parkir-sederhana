<?php
include 'koneksi.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started 
   session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
   header("Location: login.php");// send to login page
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">\
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" > 
   <!--  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --> -->
    <title>Parkir</title>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Parkir</a>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
        <ul class="app-nav">  
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
   
   <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="image/find_user.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Amshar Salam</p>
          <p class="app-sidebar__user-designation">Wakatobi Developer</p>
        </div>
      </div>
      
      <ul class="app-menu">
        <?php 
          if ($_SESSION['lavel'] == "admin") {
        ?>
        <li>
          <a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        
        <!--awal menu data anggota -->
        <li class="treeview">
          <a class="app-menu__item" href="?page=anggota"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Data Pegawai</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Ruang Parkir</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="data_parkir.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 1</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir2.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 2</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir3.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 3</a>
            </li>
          </ul>
        </li>

         <li class="treeview">
          <a class="app-menu__item" href="Jumlah_ruang.php"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Jumlah Ruang</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="mobil_masuk.php"><i class="icon fa fa-circle-o"></i> Mobil Masuk </a>
            </li>
            <li>
              <a class="treeview-item" href="parkir_masuk.php"><i class="icon fa fa-circle-o"></i> Mobil Masuk Ruang Parkir</a>
            </li>
            <li>
              <a class="treeview-item" href="keluar_ruang_parkir.php"><i class="icon fa fa-circle-o"></i> Mobil Keluar Ruang Parkir</a>
            </li>
            <li>
              <a class="treeview-item" href="parkir_keluar.php"><i class="icon fa fa-circle-o"></i> Mobil Keluar</a>
            </li>
          </ul>
        </li>
        <!--awal menu Table-->

        <!--awal menu page-->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="lap.php"><i class="icon fa fa-circle-o"></i> Laporan Perbulan</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Laporan Detail</a></li>
          </ul>
        </li>
        <!--akhir menu page-->
      </ul>

      <ul class="app-menu">
        <?php 
          } else if ($_SESSION['lavel'] == "petugasmasuk") {
        ?>
        <li>
          <a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Ruang Parkir</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="data_parkir.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 1</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir2.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 2</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir3.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 3</a>
            </li>
          </ul>
        </li>

         <li class="treeview">
          <a class="app-menu__item" href="Jumlah_ruang.php"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Jumlah Ruang</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="mobil_masuk.php"><i class="icon fa fa-circle-o"></i> Mobil Masuk </a>
            </li>
          </ul>
        </li>
        <!--awal menu Table-->

      </ul>

      <ul class="app-menu">
        <?php 
            } else if ($_SESSION['lavel'] == "petugasruang") {
        ?>
        <li>
          <a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Ruang Parkir</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="data_parkir.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 1</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir2.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 2</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir3.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 3</a>
            </li>
          </ul>
        </li>

         <li class="treeview">
          <a class="app-menu__item" href="Jumlah_ruang.php"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Jumlah Ruang</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="parkir_masuk.php"><i class="icon fa fa-circle-o"></i> Mobil Masuk Ruang Parkir</a>
            </li>
            <li>
              <a class="treeview-item" href="keluar_ruang_parkir.php"><i class="icon fa fa-circle-o"></i> Mobil Keluar Ruang Parkir</a>
            </li>
          </ul>
        </li>
        <!--awal menu Table-->

      </ul>

      <ul class="app-menu">
        <?php 
            } else if ($_SESSION['lavel'] == "petugaskeluar") {
        ?>        <li>
          <a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Ruang Parkir</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="data_parkir.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 1</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir2.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 2</a>
            </li>
            <li>
              <a class="treeview-item" href="data_parkir3.php"><i class="icon fa fa-circle-o"></i> Parkir Lantai 3</a>
            </li>
          </ul>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="parkir_keluar.php"><i class="icon fa fa-circle-o"></i> Mobil Keluar</a>
            </li>
          </ul>
        </li>
        <!--awal menu Table-->

        <?php } ?>

      </ul>
    </aside>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>