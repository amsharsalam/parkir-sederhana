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

  if ($platnomor == 0 && $ruang == 0) {  
      $status= '';
  }else{
    $status='1';
  }
  

  if ($ruang>=100 && $ruang < 200) {
    $lantai ='1';
  }else if ($ruang >=200 && $ruang < 300){
    $lantai ='2';
  }else if ($ruang >=300 && $ruang < 400){
    $lantai ='3';
  } else if ($ruang>=400 && $ruang < 500){
    $lantai ='4';
  }

  // query SQL untuk insert data
  
  $query ="UPDATE tb_parkir SET lantai='$lantai',posisi='$posisi',platnomor='$platnomor',ruang_parkir='$ruang', status=$status where ruang_parkir='$ruang'";
  mysqli_query($koneksi, $query);
?>

<body>
<div style=" margin-left: 100px; width: 80%; height: 450px; background-repeat: no-repeat; background-size: 100%;  background-image: url(gambar-mobil.jpg); display: inline-block;">
  <div style="background-color: #00675b;">
      <div id="search"></div>
        <lu>
          <a style="color: #000; display: inline-block;">RUANG PARKIR 2</a>
          <a style="display: inline-block; float: right; width: 80px; height: 18px; background:#c00;" href="parkir_masuk.php">Lantai 1</a>
          <a style="display: inline-block; float: right; width: 80px; height: 18px;background:#c00; ;" href="parkir_masuk2.php">Lantai 2</a>
          <a style="display: inline-block; float: right; width: 80px; height: 18px;background:#c00; " href="parkir_masuk3.php">Lantai 3</a>
      </lu>
  </div>

  <div style="float: left; margin-left: 30px;display: inline-block; padding-top:20px;">
      <td valign="top">
        <h3>Masukkan Ruang Parkir</h3>
          <form method="POST" action="">
            <!-- form data -->
            <table border="1" width="300" cellpadding="30" id="box-table-a">
              <tr>
                  <td width="300">
                    <label>Ruang Parkir</label>
                          <select class="form-control" name="ruang_parkir">
                              <?php
                                  $sql = $koneksi->query("select * from tb_parkir order by ruang_parkir");

                                  while ($data= $sql->fetch_assoc()){
                                    if (substr ($data['ruang_parkir'],0,1)=='2'){
                                      echo "<option value='$data[ruang_parkir]'>$data[ruang_parkir]";
                                    }
                                  }
                              ?>
                          </select>

                    </td>
                </tr>

                <tr>
                  <td>plat<input type="text" name="platnomor"></input></td>
                </tr>

                <tr>
                   <td colspan="2"><input type="submit" name="Submit" value="Simpan"/></td>
                   <td colspan="1"><input type="button" value="Tutup halaman" onclick= "self.close()"/></td>
                </tr>

              </tr>
            </table>
          </form>
      </td>
      
    </div>
    <div style=" margin-top:0px; margin-right: 200px; float: right; padding-top:20px;">
    <!-- Awal tabel kiri -->
    <h3>Ruang Parkir Lantai 2</h3>
      <div id="tabel_kiri" style="float: left;">
        <table border="2"; align="left" width="80"; cellpandding="5"; cellspacing="7"; id="box-table-a";>
          <tr bgcolor="#faebds">
            <th>
              <h3> KIRI</h3>
            </th>
             <?php 
            $h = $koneksi ->query("select *from tb_parkir order by ruang_parkir desc");
            while ($r =mysqli_fetch_array ($h)) {  //mengambil data array hasil
              if (substr ($r['ruang_parkir'],0,1)=='2'){
                  if ($r['posisi']=='kiri'){
                      if ($r['status']==0){
                        $warna= "#adff00";
                      }else{
                        $warna= "#ff0000";
                      }
                      echo "<tr bgcolor=".$warna.">";
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
      <div id="tabel_kanan" style="float: right;">
        <table border="2"; align="left"; width="80"; cellpandding="5"; cellspacing="7"; id="box-table-a";>
          <tr bgcolor=" #faebds">
            <th><h3> KANAN </h3></th>
          </tr>

          <?php
          $h = $koneksi ->query("select *from tb_parkir order by ruang_parkir desc");    //melakukan query kedatabase
            while ($r =mysqli_fetch_array ($h)) { //mengambil data array hasil
              if (substr ($r['ruang_parkir'],0,1)=='2'){
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
    <div style="height: 100px; margin-left: 100px; width:80%;  background-color: #004D40;"">
      <div style="margin-left: 10px; padding-top: 30px; text-align:center;">
        <h3>RUANG PARKIR</h3> 
      </div>
    </div>
  </div>
</body>