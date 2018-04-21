<?php
  include "koneksi.php"; //melakukan koneksi database
  include "home.php";
  //mengambil parameter dari form dan url
  date_default_timezone_set('Asia/Jakarta');
  $waktu_masuk = date('d-m-Y');
  $jam_masuk = date('H:i:s');
?>

<body>
<main class="app-content">    
    <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mobil Masuk</h1>
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
                    <div style="float: left; margin-left: 40px; display: inline-block; padding-top: 20px;">
                      <div style="  margin-left: 10px;">
                        <td valign="top">
                          <h3>Masukkan Plat Nomor Mobil</h3>
                          <form method="POST" action="">
                            <!-- form data -->
                            <table border="1" width="240" cellpadding="5" id="box-table-a">
                              <tr>
                                <tr>
                                  <td>Plat Nomor <input type="text" name="platnomor"></input></td>
                                </tr>
                                <tr>
                                  <td>TGL Masuk <input type="text" name="waktu_masuk" value="<?php echo $waktu_masuk; ?>"></input></td>
                                </tr>
                                <tr>
                                  <td>Jam Masuk <input type="text" name="jam_masuk" value="<?php echo $jam_masuk; ?>"></input></td>
                                </tr>
                                <tr>
                                   <td colspan="1">
                                    <input type="submit" name="Submit" value="Simpan"/>
                                    <input type="button" value="Tutup halaman" onclick= "self.close()"/>
                                  </td>
                                </tr>
                              </tr>
                            </table>
                          </form>
                        </td>
                      </div>
                    </div>
                    <?php
                    if (isset($_POST['Submit'])) {
                      if (isset($_POST['platnomor'])){
                        $plat = $_POST['platnomor'];
                      }else{
                        $plat = "";
                      }
                      $waktu_masuk = $_POST['waktu_masuk'];
                      $jam_masuk = $_POST['jam_masuk'];
                       
                      $prosescek = $koneksi -> query("select * from tb_mobil where platnomor = '$plat'"); 
                      $rdata = mysqli_fetch_array($prosescek);
                        if ($plat<>"" and $rdata['platnomor']<>$plat) { //proses mengingatkan data sudah ada
                            $tampil = $koneksi -> query("insert into tb_mobil (platnomor, waktu_masuk, jam_masuk) values ('$plat', '$waktu_masuk','$jam_masuk')");
                            if ($sql) {
                                ?>
                                    <script type="text/javascript">
                                        alert ("Data Berhasil Disimpan");
                                        window.location.href="?";
                                    </script>
                                <?php
                            }
                        }
                        else {
                          echo "<script>alert('platnomor Sudah Ada');</script>";
                        }
                      }
                    ?>
                      <div style="margin-left: 100px; margin-top: 56px; "> 
                        <div id="search"></div>
                        <table class="table-bordered" border="2" align="left" width="500" cellpadding="5" id="box-table-a">
                        <!--menampilkan data dalam bentuk tabel-->
                        <tr bgcolor="#faebd7">
                          <th scope="col">Plat Nomor</th>
                          <th scope="col" >TGL Masuk</th>
                          <th scope="col" >Jam Masuk</th>
                          <th scope="col" >TGL Keluar</th>
                          <th scope="col" >Jam Keluar</th>
                          <th scope="col" COLSPAN="2">Aksi</th>
                        </tr>

                        <?php
                          //melakukan query ke database
                          $h = $koneksi -> query("select *from tb_mobil order by platnomor desc");
                          $warna= "#adff00";
                          while ($r = mysqli_fetch_array($h)){
                            if (substr ($r['waktu_keluar'],0,1)==''){
                              echo "<tr bgcolor=".$warna.">";
                              echo "<td><b>".$r['platnomor']."</b></td>";
                              echo "<td><b>".$r['waktu_masuk']."</b></td>";
                              echo "<td><b>".$r['jam_masuk']."</b></td>";
                              echo "<td><b>".$r['waktu_keluar']."</b></td>";
                              echo "<td><b>".$r['jam_keluar']."</b></td>";
                        ?>
                        
                        <td><b >Keluar</b></td>
                        
                        <?php  
                            }
                          }
                          echo "</tr>";
                        ?>
                    
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </body>