<?php
$id = $_GET['id'];
session_start();
include "koneksi.php";
date_default_timezone_set('Asia/Bangkok');

$query=mysqli_query($conn,"DELETE from regional where id_regional=$id");
echo "<script>
	alert ('Lokasi berhasil dihapus');
	</script>";
echo"<meta http-equiv=refresh content=0;url=lokasiAdmin.php>";
?>
