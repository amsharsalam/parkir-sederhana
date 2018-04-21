<?php
  include "home.php";
  include 'koneksi.php';
  // menyimpan data kedalam variabel
  $lantai           = $_POST['lantai'];
  $posisi           = $_POST['posisi'];
  $platnomor        = $_POST['platnomor'];
  $ruang            = $_POST['ruang_parkir'];
  $status           = $_POST['status'];

  if ($ruang %2 == 0) {  
      $posisi="kanan";
  }else{
    $posisi="kiri";
  }

  // query SQL untuk insert data
  
  $query ="UPDATE tb_parkir SET platnomor='', status='0' where platnomor='$platnomor'";
      mysqli_query($koneksi, $query);
?>

<body>
<main class="app-content">    
    <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mobil Keluar Ruang Parkir</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                  <div class = "table-responsive">

        <div style="float: left; margin-left: 30px;display: inline-block; padding-top:20px;">
            <td valign="top">
              <h3>Masukkan Ruang Parkir</h3>
                <form method="POST" action="">
                  <!-- form data -->
                  <table border="1" width="300" cellpadding="9" id="box-table-a">

                      <tr>
                        <td width="200">
                          <label>Plat Nomor</label>
                                <select class="form-control" name="platnomor">
                                    <?php
                                        $sql = $koneksi->query("select * from tb_mobil order by platnomor");

                                        while ($data= $sql->fetch_assoc()){
                                          if (substr ($data['waktu_keluar'],0,1)==''){
                                          echo "<option value='$data[platnomor]'>$data[platnomor]";
                                        }
                                      }
                                  ?>
                              </select>

                        </td>
                    </tr>

                    <tr>
                      <td colspan="2">
                        <input type="submit" name="Submit" value="Simpan"/>
                        <input type="button" value="Tutup halaman" onclick= "self.close()"/>
                      </td>
                    </tr>

                  </tr>
                </table>
              </form>
          </td>
          
        </div>
        <div style=" margin-top:0px; margin-right: 200px; float: right;padding-top:20px;">
        <!-- Awal tabel kiri -->
        <h3>Ruang Parkir Lantai 1</h3>
          <div id="tabel_kiri" style="float: left;">
            <table class="table table-bordered" border="2"; align="left" width="80"; cellpandding="5"; cellspacing="7"; id="box-table-a";>
              <tr bgcolor="#faebds">
                <th>
                  <h3> KIRI</h3>
                </th>
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
                          echo "<tr bgcolor =".$warna.">";
                          echo "<th><b>".$r['ruang_parkir']."</b></th>";
                          echo "</tr>";
                      }
                  }
                }
              ?>

              </tr>

             
            </table>
          </div>
          <!-- Akihir tabel kiri -->

          <!-- Awal tabel Kanan -->
          <div id="tabel_kanan" style="display: inline-block; ">
            <table class="table table-bordered" border="2"; align="left"; width="80"; cellpandding="5"; cellspacing="7"; id="box-table-a";>
              <tr bgcolor=" #faebds">
                <th><h3> KANAN </h3></th>
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
                        echo "</tr>";
                      }
                    }
                  }
               ?>
            </table>
          </div>
      <!-- Akhir tabel kanan -->
    </div>
  </div>
  </div>
</body>