<?php
$id = $_GET['id'];
session_start();
include "koneksi.php";
date_default_timezone_set('Asia/Bangkok');
$target_dir = "img/artikel/";
$get_data = mysqli_query($conn,"SELECT foto_artikel FROM artikel where id_artikel=$id");
$hasil = mysqli_fetch_array($get_data, MYSQLI_ASSOC);
if($hasil['foto_artikel']<>"-")
{
    unlink("img/artikel/".$hasil['foto_artikel']);
}


$query=mysqli_query($conn,"DELETE from artikel where id_artikel=$id");
echo "<script>
	alert ('Artikel berhasil dihapus');
	</script>";
echo"<meta http-equiv=refresh content=0;url=artikelAdmin.php>";
?>
