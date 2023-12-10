<?php
$id = $_GET['id'];
session_start();
include "koneksi.php";
date_default_timezone_set('Asia/Bangkok');
$target_dir = "img/wisata/";
$get_data = mysqli_query($conn,"SELECT foto_pameran FROM pameran where id_pameran=$id");
$hasil = mysqli_fetch_array($get_data, MYSQLI_ASSOC);
if($hasil['foto_pameran']<>"-")
{
    unlink("img/wisata/".$hasil['foto_pameran']);
}


$query=mysqli_query($conn,"DELETE from pameran where id_pameran=$id");
echo "<script>
	alert ('Wisata berhasil dihapus');
	</script>";
echo"<meta http-equiv=refresh content=0;url=wisataAdmin.php>";
?>
