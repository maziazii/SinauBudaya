<?php
$id = $_GET['id'];
session_start();
include "koneksi.php";
date_default_timezone_set('Asia/Bangkok');

$query=mysqli_query($conn,"DELETE from kategori where id_kategori=$id");
echo "<script>
	alert ('Kategori berhasil dihapus');
	</script>";
echo"<meta http-equiv=refresh content=0;url=kategoriAdmin.php>";
?>
