<?php
  include "koneksi.php"; //melalukan koneksi database
  include "home.php"
 ?>

<html>
<head>
  <meta charset="utf-8">
  <title>Data Parkir</title>
</head>
<body>
  <main class="app-content">    
    <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Table Parkir Lantai 1</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="panel-heading">
                        <a href="tambah_parkir.php " class="btn btn-success" style="margin-bottom: 7px;">Tambah Data</a>
                        <a href="./laporan/laporan_anggota.php" class="btn btn-success" style="margin-bottom: 7px;">export</a>
                    <div class = "table-responsive">
                    <div style="float: left; margin-right: 40px; display: inline-block; padding-top: 20px;">
                        <table  class="table table-bordered" border="2"; align="left" width="350"; cellpandding="5"; cellspacing="7"; id="box-table-a";>
                          <tr bgcolor="#faebds">
                            <th><h3> K I R I</h3></th>
                            <th bgcolor="#c00"><a href="data_parkir_lantai2.php">REFRESH</a></th>
                          </tr>
                          <tr bgcolor="#faebd7">
                            <th scope="col">ruang parkir</th>
                            <th scope="col">plat nomor</th>
                          </tr>

                          <?php 
                            $h = $koneksi ->query("select *from tb_parkir order by ruang_parkir desc");
                            while ($r =mysqli_fetch_array ($h)) {  //mengambil data array hasil
                              if (substr ($r['ruang_parkir'],0,1)=='1'){
                                  if ($r['posisi']=='kiri'){
                                      if ($r['status']==0){
                                        $warna= "#adff00";
                                      }else{
                                        $warna= "#ff0000";
                                      }
                                      echo "<tr bgcolor=".$warna.">";
                                      echo "<th><b>".$r['ruang_parkir']."</b></th>";
                                      echo "<th><b>".$r['platnomor']."</b></th>";
                                      echo "</tr>";
                                    }
                                }
                              }
                          ?>
                        </table>
                      </div>
                      <!-- Akihir tabel kiri -->

                      <!-- Awal tabel Kanan -->
                      <div style=" margin-right: 40px; display: inline-block; padding-top: 20px;">
                        <table class="table table-bordered" border="2"; align="left"; width="350"; cellpandding="5"; cellspacing="7"; id="box-table-a";>
                          <tr bgcolor=" #faebds">
                            <th><h3> K A N A N </h3></th>
                              <th bgcolor="#c00"><a href="data_parkir.php">REFRESH</a></th>
                           </tr>
                          <tr bgcolor="#faebd7">
                            <th scope="col">ruang parkir</th>
                            <th scope="col">plat nomor</th>
                          </tr>

                          <?php
                            $h = $koneksi ->query("select *from tb_parkir order by ruang_parkir desc");    //melakukan query kedatabase
                              while ($r =mysqli_fetch_array ($h)) { //mengambil data array hasil
                                if (substr ($r['ruang_parkir'],0,1)=='1'){
                                  if ($r['posisi']=='kanan'){
                                      if ($r['status']==0){
                                        $warna="#adff00";
                                      }else{
                                        $warna="#ff0000";
                                      }
                                      echo "<tr bgcolor=".$warna.">";
                                      echo "<th><b>".$r['ruang_parkir']."</b></th>";
                                      echo "<th><b>".$r['platnomor']."</b></th>";
                                    
                                  }
                                }
                              }
                           ?>
                        </table>
                      </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </main>
  </body>
</html>