<?php
include'koneksi.php';
//menyimpan data keadalam varibel
$ruang_parkir 		= $_POST ['ruang_parkir'];
 
$platnomor			= $_POST ['platnomor'];

//query SQL untuk update data

$query = "UPDATE tb_parkir  SET platnomor = '$platnomor', status = '1'
where ruang_parkir = '$ruang_parkir' "