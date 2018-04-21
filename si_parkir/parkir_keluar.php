<?php
  include "home.php";
  include "koneksi.php"; //melakukan koneksi database
  //mengambil parameter dari form dan url
  date_default_timezone_set('Asia/Jakarta');
  $waktu_keluar = date('d-m-Y');
  $jam_keluar = date('H:i:s');
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
                    <div style="float: left; margin-left: 0px; display: inline-block; padding-top: 20px;">
                      <div style="  margin-left: 10px;">
                        <td valign="top">
                          <h3>Masukkan Plat Nomor</h3>
                          <form method="POST" action="">
                            <!-- form data -->
                            <table border="1" width="240" cellpadding="5" id="box-table-a">
                              <tr>
                                <tr>
                                  <td width="20">
                                      <label>Plat Nomor</label>
                                            <select  name="platnomor">
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
                                  <td>TGL Keluar <input type="text" name="waktu_keluar" value="<?php echo $waktu_keluar; ?>"></input></td>
                                </tr>
                                 <tr>
                                  <td>Jam Keluar <input type="text" name="jam_keluar" value="<?php echo $jam_keluar; ?>"></input></td>
                                </tr>

                                <tr>
                                   <td colspan="2"><input type="submit" name="Submit" value="Simpan"/>
                                   <input type="button" value="Tutup halaman" onclick= "self.close()"/></td>
                                </tr>
                              </tr>
                            </table>
                          </form>
                        </td>
                      </div>
                    </div>
                    <?php
                      $simpan = $_POST['Submit'];
                      $waktu_masuk = $_POST['waktu_keluar'];
                      $jam_keluar = $_POST['jam_keluar'];
                      $plat = $_POST['platnomor'];
                       
                      $prosescek = $koneksi -> query("select * from tb_mobil where platnomor = '$plat'"); 
                      $rdata = mysqli_fetch_array($prosescek);
                      if ($simpan) {
                        $query ="UPDATE tb_mobil SET platnomor='$plat', waktu_keluar='$waktu_keluar', jam_keluar='$jam_keluar' where platnomor='$plat'";
                        mysqli_query($koneksi, $query);

                        if ($sql) {
                            ?>
                                <script type="text/javascript">
                                    alert ("Data Berhasil Disimpan");
                                    window.location.href="?";
                                </script>
                            <?php
                        }
                      }
                    ?>
                      <div style="margin-left: 300px; margin-top: 10px; "> 
                        <div id="search"></div>
                        <table border="2" align="left" width="500" cellpadding="5" id="box-table-a">
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
                          $aksi = 'Hapus';
                          while ($r = mysqli_fetch_array($h)){
                            echo "<tr bgcolor=".$warna.">";
                            echo "<td><b>".$r['platnomor']."</b></td>";
                            echo "<td><b>".$r['waktu_masuk']."</b></td>";
                            echo "<td><b>".$r['jam_masuk']."</b></td>";
                            echo "<td><b>".$r['waktu_keluar']."</b></td>";
                            echo "<td><b>".$r['jam_keluar']."</b></td>";
                            echo "<td><b>".$aksi."</b></td>";
                            echo "</tr>";
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
        </main>
</body>