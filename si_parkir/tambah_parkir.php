<?php
  include "home.php";
  include "koneksi.php"; //melakukan koneksi database
  //mengambil parameter dari form dan url
  if (isset($_POST['Submit'])) {
    if (isset($_POST['ruang_parkir'])){
      $ruang = $_POST['ruang_parkir'];
    }else{
      $ruang = "";
    }
    if ($ruang %2 == 0) {  
      $posisi="kanan";
    }else{
      $posisi="kiri";
    }

    if ($ruang>=100 && $ruang < 200) {
      $lantai ='1';
    }else if ($ruang >=200 && $ruang < 300){
      $lantai ='2';
    }else if ($ruang >=300 && $ruang < 400){
      $lantai ='3';
    }else if ($ruang>=400 && $ruang < 500){
      $lantai ='4';
    }

    $prosescek = $koneksi -> query("select * from tb_parkir where ruang_parkir = '$ruang'"); 
    $rdata = mysqli_fetch_array($prosescek);
      if ($ruang<>"" and $rdata['ruang_parkir']<>$ruang) { //proses mengingatkan data sudah ada
        if ($ruang <= 500){
          $tampil = $koneksi -> query("insert into tb_parkir (ruang_parkir, posisi, lantai) values ('$ruang', '$posisi', '$lantai')");
        }else{
          echo "<script>alert('Kesalahan');</script>";
        }
      }else {
        echo "<script>alert('Ruang Sudah Digunakan');</script>";
      }
    }
?>

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
                    <div class = "table-responsive">
                    <div style=" margin-left: 0px; float: left; padding-top: 40px;">
                      <td valign="top">
                        <h3>Masukkan Ruang Parkir</h3>
                          <form method="POST" action="">
                            <!-- form data -->
                            <table  border="1" width="300" cellpadding="5" id="box-table-a">
                              
                                <tr>
                                  <td>Kode Ruang Parkir<input type="text" name="ruang_parkir"></input></td>
                                </tr>
                                <tr>
                                   <td colspan="2">
                                    <input type="submit" name="Submit" value="Simpan"/>
                                    <input type="button" value="Tutup halaman" onclick= "self.close()"/>
                                  </td>
                                </tr>
                              
                            </table>
                          </form>
                      </td>
                    </div>

                    <div style=" margin-right: 0px; display: inline-block; padding-top: 80px;"> 
                        <table class="table table-bordered" border="2" align="left" width="200" cellpadding="5" id="box-table-a">
                        <!--menampilkan data dalam bentuk tabel-->
                        <tr bgcolor="#faebd7">
                          <th COLSPAN="2" WIDTH="261">K I R I</th>
                        </tr>
                        <tr bgcolor="#faebd7">
                          <th scope="col">lantai</th>
                          <th scope="col">Ruang parkir</th>
                        </tr>
                        <?php
                          //melakukan query ke database
                          $h = $koneksi -> query("select * from tb_parkir order by ruang_parkir desc");
                          while ($r = mysqli_fetch_array($h)){   //mengambil data array hasil dari database dan menampung dalam variabel $r
                            $warna = "#adff00";
                            if ($r['posisi']=='kiri'){
                              echo "<tr bgcolor=".$warna.">";
                              echo "<td><b>".$r['lantai']."</b></td>";
                              echo "<td><b>".$r['ruang_parkir']."</b></td>";
                              echo "</tr>";
                            }
                          }
                        ?>
                        </table>
                      </div>

                      <div style=" margin-right: 0px; display: inline-block; padding-top: 60px;"> 
                          <table class="table table-bordered" border="2" align="center" width="200" cellpadding="5" id="box-table-a">
                              <!--menampilkan data dalam bentuk tabel-->
                          <tr bgcolor="#faebd7">
                            <th COLSPAN="2" WIDTH="261">K A N A N</th>
                          </tr>
                          <tr bgcolor="#faebd7">
                            <th scope="col">lantai</th>
                            <th scope="col">Ruang parkir</th>
                          </tr>

                          <?php
                            //melakukan query ke database*/
                            $h = $koneksi -> query("select * from tb_parkir order by ruang_parkir desc");
                            while ($r = mysqli_fetch_array($h)) { //mengambil data array hasil dari database dan menampung dalam variabel $r
                              $warna = "#adff00";
                                if ($r['posisi']=='kanan'){
                                  echo "<tr bgcolor=".$warna.">";
                                  echo "<td><b>".$r['lantai']."</b></td>";
                                  echo "<td><b>".$r['ruang_parkir']."</b></td>";
                                  echo "</tr>";
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
          </div>
        </div>
      </main>