<?php
include 'koneksi.php';
include 'home.php';
?>
<body>
<main class="app-content">    
    <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Table Kapasitas Ruang Parkir</h1>
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
                    <div class="table-responsive">
						  <div style="float: left; margin-left: 40px; display: inline-block; padding-top: 20px;">
						    <div style="  margin-left: 10px;">
						 
								<form action="lap.php" method="get">
									<label>Bulan :</label>
									<select class="form-control" name="cari">
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

									<input type="submit" value="Cari">
								</form>
								 
								<?php
								if(isset($_GET['cari'])){
									$cari = $_GET['cari'];
									echo "<b>Hasil pencarian : ".$cari."</b>";
								}
								?>
								 
								<table border="1" class="table table-striped table-bordered table-hover" id="sampleTable">
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Jumlah</th>
										<th>Hasil</th>
									</tr>

									<?php 
									if(isset($_GET['cari'])){
										$cari = $_GET['cari'];

										/*
										$cari = is_int($_GET['cari']) ? $_GET['cari'] : 0;*/	
										/*$data = $koneksi->query("select * from tb_mobil2 where waktu_keluar_date like '%-".$cari."-%'");*/
										/*$datas = $koneksi->query("select distinct waktu_keluar_date from tb_mobil2 where waktu_keluar_date like '%-".$cari."-%'");
										$datass = $datas->fetch_assoc();
										$counts = $koneksi->query("select count(*) from tb_mobil2 where waktu_keluar_date='2018-04-11'");
										$count = $counts->num_rows;
										echo $count;*/

										$data = $koneksi->query("SELECT waktu_keluar, COUNT(*) AS plat_nomor  FROM tb_mobil where waktu_keluar like '%-".$cari."-%' GROUP BY waktu_keluar"); 

										/*$sql = $koneksi->query("SELECT count(*) AS cari FROM $tb_mobil2");
										$result = mysqli_fetch_array($sql);
										echo "Jumlah data dengan fungsi MySQL count(): {$result['cari']} <br/>";*/

									}else{
										$data = $koneksi->query("SELECT waktu_keluar, COUNT(*) AS plat_nomor  
											FROM tb_mobil where waktu_keluar like '%-01-%' 
											GROUP BY waktu_keluar ");	
									}
									$cekdata=mysqli_num_rows($data);
								    if($cekdata=='0'){
								        echo "Maaf Data Yang anda cari tidak ada";
								    }
									$no = 1;
									while($d = mysqli_fetch_array($data)){
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['waktu_keluar']; ?></td>
										<td><?php echo $d['plat_nomor']; ?></td>
										<td>
										<?php
									        $Hasil = 2000;
									        $kendaraan = $d['plat_nomor'];
									        $denda1 = $Hasil*$kendaraan;

									        echo "
									        <font color='red'> 
								               Rp $denda1
								            </font>";

								            $totalKaryawan = 0;

								            $total += $denda1;
								           
								    	?>
										</td>
									</tr>

									<?php 
								}
										echo "<tr><td colspan='2'>Jumlah</td><td></td><td>".$total."</td></tr>";
										
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