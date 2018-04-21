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
                    <div class="panel-heading">
                        <a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-bottom: 7px;">Tambah Data</a>
                        <a href="./laporan/laporan_anggota.php" class="btn btn-success" style="margin-bottom: 7px;">export</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sampleTable">

							<tr>
								<th>Ruang Tersisa</th>
								<td><?php
									$data = $koneksi->query("SELECT ruang_parkir, COUNT(*) AS ruang_parkir
									FROM tb_parkir where status like '%0%' 
									GROUP BY status ");
									while($d = mysqli_fetch_array($data)){
							 			echo $d['ruang_parkir']; 			
							 		?>
							 	</td>
							</tr>
							<tr><th>Ruang Terisi</th>
								<td><?php
										$dataa = $koneksi->query("SELECT ruang_parkir, COUNT(*) AS ruang_parkir
										FROM tb_parkir where status like '%1%' 
										GROUP BY status ");
										while($dt = mysqli_fetch_array($dataa)){
								 			echo $dt['ruang_parkir']; 
								 	?>	
								 </td>
							</tr>
							<tr>
								<th>Jumlah Total</th>
								<td><?php
										$dataparkir = $d['ruang_parkir'];
										$datasisa = $dt['ruang_parkir'];
										
											$hasil=$dataparkir+$datasisa;
								 			echo $hasil;
								 		}
								 	}
								
								 		?>	
								 </td>
							</tr>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</body>
</body>