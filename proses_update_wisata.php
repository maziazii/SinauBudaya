<?php
session_start();
if (!isset($_POST['judul_pameran'])) {
    header('Location:update_wisata.php');
    exit;
}
include "koneksi.php";

date_default_timezone_set('Asia/Bangkok');

$judulWisata = $_POST['judul_pameran'];
$ids = $_POST['id_pameran'];
$deskripsiWisata = $_POST['deskripsi_pameran'];
$htmWisata = $_POST['htm_pameran'];
$lokasiWisata = $_POST['lokasi_pameran'];
$waktuWisata = $_POST['waktu_pameran'];
$tanggalWisata = $_POST['tanggal_pameran'];
$namaKategori = $_POST['nama_kategori'];
$namaRegional = $_POST['nama_regional'];

$dater2 = date_create("$tanggalWisata");
$tanggalWisata = date_format($dater2, "Y-m-d");

// Check if a new file is uploaded
if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0 || $_FILES["fileToUpload"]["name"] == "") {
    // No new file is uploaded, update without changing the photo
    $update_query2 = mysqli_query($conn, "UPDATE `pameran` SET `judul_pameran` = '$judulWisata', `deskripsi_pameran` = '$deskripsiWisata', `htm_pameran` = '$htmWisata', `lokasi_pameran` = '$lokasiWisata',`waktu_pameran` = '$waktuWisata',`tanggal_pameran` = '$tanggalWisata', `id_kategori` = '$namaKategori', `id_regional` = '$namaRegional' WHERE `pameran`.`id_pameran` = '$ids'");

    if ($update_query2) {
        echo "<script>
    alert ('Wisata berhasil diubah');
    </script>";
        echo "<meta http-equiv='refresh' content='0;url=wisataAdmin.php'>";
    } else {
        echo "<script>
    alert ('Terjadi galat, Wisata gagal diubah');
    </script>";
        echo "<meta http-equiv='refresh' content='0;url=update_wisata.php?id=$ids'>";
        // Tampilkan pesan kesalahan SQL
        var_dump(mysqli_error($conn));
    }
} else {
    // New file is uploaded, continue with the existing logic

    $target_dir = "img/wisata/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 10044070) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png") {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>
            alert ('Cek Ukuran File, Tipe File');
            </script>";
        echo "<meta http-equiv='refresh' content='0;url=update_wisata.php?id=$ids'>";
    } else {
        $get_data = mysqli_query($conn, "SELECT foto_pameran FROM pameran where id_pameran='$ids'");
        $hasil = mysqli_fetch_array($get_data, MYSQLI_ASSOC);
        if ($hasil['foto_pameran'] <> "-") {
            unlink("img/wisata/" . $hasil['foto_pameran']);
        }

        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $newfilename)) {

            $update_query = mysqli_query($conn, "UPDATE `pameran` SET `judul_pameran` = '$judulWisata', `deskripsi_pameran` = '$deskripsiWisata', `htm_pameran` = '$htmWisata', `foto_pameran` = '$newfilename', `lokasi_pameran` = '$lokasiWisata',`waktu_pameran` = '$waktuWisata',`tanggal_pameran` = '$tanggalWisata', `id_kategori` = '$namaKategori', `id_regional` = '$namaRegional' WHERE `pameran`.`id_pameran` = '$ids'");
            if ($update_query) {
                echo "<script>
                alert ('Wisata berhasil diubah');
                </script>";
                echo "<meta http-equiv='refresh' content='0;url=wisataAdmin.php'>";
            } else {
                echo "<script>
                alert ('Terjadi galat, wisata gagal diubah');
                </script>";
                echo "<meta http-equiv='refresh' content='0;url=update_wisata.php?id=$ids'>";
                // Tampilkan pesan kesalahan SQL
                var_dump(mysqli_error($conn));
            }
        } else {
            echo "<script>
            alert ('Sorry, there was an error uploading your file');
            </script>";
            echo "<meta http-equiv='refresh' content='0;url=update_wisata.php?id=$ids'>";
        }
    }
}
?>
