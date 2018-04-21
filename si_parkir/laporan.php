<?php
  include "home.php";
  include "koneksi.php"; //melakukan koneksi database
  //mengambil parameter dari form dan url
  date_default_timezone_set('Asia/Jakarta');
  $waktu_keluar = date('d-m-Y H:i:s');
?>

<body>
<div style=" margin-left: 100px; width: 80%; height: 450px; background-repeat: no-repeat; background-size: 100%;  background-image: url(gambar-mobil.jpg); display: inline-block;">
  <div style="background-color: #00675b">
      <div id="search"></div>
      <h2><a style="color: #000;">Mobil Keluar</a></h2>
  </div>
  <div style="float: left; margin-left: 40px; display: inline-block; padding-top: 20px;">
    <div style="  margin-left: 10px;">
      <td valign="top">
        <h3>Masukkan Plat Nomor</h3>
        <form method="POST" action="">
          <!-- form data -->
          <table border="1" width="320" cellpadding="5" id="box-table-a">
            <tr>
              <tr>
                <td width="500">
                    <label>Bulan</label>
                          <select class="form-control" name="bulan">
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">April</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>


                            <select name="tahun">
                              <?php
                                $mulai=date('Y');
                                for ($i=$mulai; $i<$mulai+30; $i++) {
                                  $sel = $i == date('Y') ? 'selected="selected"' : '';
                                  echo '<option value ="'.$i.'"'.$sel.'>'.$i.'</option>';
                                }
                              ?>
                          </select>

                    </td>
              </tr>
            
              <tr>
                 <td colspan="2"><input type="submit" name="Submit" value="Tampilkan"/></td>
                 <td colspan="1"><input type="button" value="Tutup halaman" onclick= "self.close()"/></td>
              </tr>
            </tr>
          </table>
        </form>
      </td>
    </div>
  </div>

  <?php
    if(isset($_GET['bulan'])){
      $cari = $_GET['bulan'];
      $tahun = $_POST['tahun'];    
      echo "<b>Hasil pencarian : ".$bulan."</b>";
  }
  ?>

  <div style="margin-left: 100px; margin-top: 10px; ">
    <table width="488" border="0" cellpadding="3" cellspacing="1" bgcolor="#33CCFF">
      <tr>
        <td align="center" valign="middle" bgcolor="#71DCFF"><strong>NO</strong></td>
        <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Waktu </strong></td>
        <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Jumlah </strong></td>
        <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Pendapatan</strong></td>
      </tr> 

    <?php
      include "koneksi.php";
      $ambildata=$koneksi->query("select * from tb_mobil where month(waktu_keluar)='$bulan' and year(waktu_keluar)='$tahun'");
      $warna= "#adff00";
      $cekdata=mysqli_num_rows($ambildata);
      if($cekdata=='0'){
        echo "Maaf Data Yang anda cari tidak ada";
      }
      while($cetakdata=mysqli_fetch_array($ambildata)){
            echo "<tr bgcolor=".$warna.">";
            echo "<td><b>".$cetakdata['no']."</b></td>";
            echo "<td><b>".$cetakdata['waktu_keluar']."</b></td>";
            echo "<td><b>".$cetakdata['Jumlah']."</b></td>";
            echo "<td><b>".$aksi."</b></td>";
            echo "</tr>";
          }
    ?>
    
    </table>
  <?php 
    }
  ?>
  </div>
  </div>
</body>