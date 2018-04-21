<?php
  include "home.php";
  include "koneksi.php"; //melakukan koneksi database
  //mengambil parameter dari form dan url
  if (isset($_POST['Submit'])) {
    if (isset($_POST['no_parkir'])){
      $ruang = $_POST['no_parkir'];
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
    } else if ($ruang>=400 && $ruang < 500){
      $lantai ='4';
    }

    $prosescek = $koneksi -> query("select * from tb_ruangparkir where no_parkir = '$ruang'"); 
    $rdata = mysqli_fetch_array($prosescek);
      if ($ruang<>"" and $rdata['no_parkir']<>$ruang) { //proses mengingatkan data sudah ada
        if ($ruang <= 500){
          $tampil = $koneksi -> query("insert into tb_ruangparkir (no_parkir, posisi, lantai) values ('$ruang', '$posisi', '$lantai')");
        }else{
          echo "<script>alert('Kesalahan');</script>";
        }
      }else {
        echo "<script>alert('Ruang Sudah Digunakan');</script>";
      }
    }
?>

<body style=" margin-left: 100px; width: 80%;">
<div style=" margin-left: 100px; width: 80%; background-size: 100%; background-color:#B0BEC5;">
	<div style="background-color: #00675b">
	    <div id="search"></div>
	    <h2><a style="color: #000;">RUANG PARKIR</a></h2>
	</div>

	<div style="margin-left: 100px; margin-top: 10px; "> 
	    <div style=" margin-left: 0px; ">
	      <div id="search"></div>
	      <table border="2" align="left" width="300" cellpadding="5" id="box-table-a">
	      <!--menampilkan data dalam bentuk tabel-->
	      <tr bgcolor="#faebd7">
	        <th COLSPAN="4" WIDTH="461">K I R I</th>
	      </tr>
	      <tr bgcolor="#faebd7">
	        <th scope="col">lantai</th>
	        <th scope="col" >Ruang parkir</th>
	        <th scope="col" COLSPAN="2">Aksi</th>
	      </tr>
	      <?php
	        //melakukan query ke database
	        $h = $koneksi -> query("select * from tb_ruangparkir order by no_parkir desc");
	        while ($r = mysqli_fetch_array($h)){   //mengambil data array hasil dari database dan menampung dalam variabel $r
	          echo "<tr>";
	          if ($r['posisi']=='kanan'){
	              echo "<td><b>".$r['lantai']."</b></td>";
	              echo "<td><b>".$r['no_parkir']."</b></td>";
	      ?>
	      		<td><b>Ubah</b></td>
	    		<td>
			        <b href "">Hapus</b>
	    		</td>
	    	<?php 
	    		}
	    	}
	    		echo "</tr>";
	    	 ?>
	    	

		
	      </table>
	    </div>

	    <div style=" margin-right: 0px;">
	      	<div id="search"></div>
	        <table border="2" align="center" width="300" cellpadding="5" id="box-table-a">
	            <!--menampilkan data dalam bentuk tabel-->
		        <tr bgcolor="#faebd7">
		          <th COLSPAN="4" WIDTH="461">K A N A N</th>
		        </tr>
		        <tr bgcolor="#faebd7">
		          <th scope="col">lantai</th>
		          <th scope="col">Ruang parkir</th>
		          <th scope="col" COLSPAN="2">Aksi</th>
		        </tr>

		        <?php
		          //melakukan query ke database*/
		          $h = $koneksi -> query("select * from tb_ruangparkir order by no_parkir desc");
		          while ($r = mysqli_fetch_array($h)) { //mengambil data array hasil dari database dan menampung dalam variabel $r
		            echo "<tr>";
		            if ($r['posisi']=='kiri') {
		              echo "<td><b>".$r['lantai']."</b></td>";
		              echo "<td><b>".$r['no_parkir']."</b></td>";
		        ?>
		        	<td><b href="?<?php  ?>">Ubah</b></td>
		    		<td>
				        <b onclick="return confirm('Apakan Anda Yakin Ingin Menghapus Data Ini...???')" href="?<?php  ?>">Hapus</b>
		    		</td>
		    	<?php 
		    		}
		    	}
		    		echo "</tr>";
		    	 ?>
	      	</table>
	    </div>
  	</div>
	  	<div style=" margin-top: 330px; height: 100px; background-color: #004D40;"">
			<div style="  margin-left: 10px;">
		    <td valign="top">
		      <h3>Masukkan Ruang Parkir</h3>
		        <form method="POST" action="">
		          <!-- form data -->
		          <table border="1" width="300" cellpadding="5" id="box-table-a">
		            <tr>
		              <tr>
		                <td>ruang Parkir<input type="text" name="no_parkir"></input></td>
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
		</div>
	</div>
</body>