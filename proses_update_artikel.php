<?php
session_start();
if (!isset($_POST['judul_artikel'])) {
  header('Location: update_artikel.php');
  exit;
}
include "koneksi.php";

date_default_timezone_set('Asia/Bangkok');

$ids = $_POST['id_artikel'];
$judulArtikel = $_POST['judul_artikel'];
$deskripsiArtikel = $_POST['deskripsi_artikel'];
$tanggalArtikel = $_POST['tanggal_artikel'];
$penulisArtikel = $_POST['penulis_artikel'];

$dater2 = date_create("$tanggalArtikel");
$tanggalArtikel = date_format($dater2, "Y-m-d");

if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0 || $_FILES["fileToUpload"]["name"] == "") {
    $newfilename = "-";
    $update_query2 = mysqli_query($conn, "UPDATE `artikel` SET `judul_artikel` = '$judulArtikel', `deskripsi_artikel` = '$deskripsiArtikel', `tanggal_artikel` = '$tanggalArtikel', `penulis_artikel` = '$penulisArtikel' WHERE `id_artikel` = '$ids'");
    if ($update_query2) {
        echo "<script>
    alert ('Berita berhasil diubah');
    </script>";
        echo "<meta http-equiv='refresh' content='0;url=artikelAdmin.php'>";
    } else {
        echo "<script>
    alert ('Terjadi galat, Berita gagal diubah');
    </script>";
        echo "<meta http-equiv='refresh' content='0;url=update_artikel.php?id=$ids'>";
        // Tampilkan pesan kesalahan SQL
        var_dump(mysqli_error($conn));
    }
} else {
    $target_dir = "img/artikel/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
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
        echo "<meta http-equiv='refresh' content='0;url=update_artikel.php?id=$ids'>";
    } else {
        $get_data = mysqli_query($conn, "SELECT foto_artikel FROM artikel where id_artikel='$ids'");
        $hasil = mysqli_fetch_array($get_data, MYSQLI_ASSOC);
        if ($hasil['foto_artikel'] <> "-") {
            unlink("img/artikel/" . $hasil['foto_artikel']);
        }

        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $newfilename)) {

            $update_query = mysqli_query($conn, "UPDATE `artikel` SET `judul_artikel` = '$judulArtikel', `deskripsi_artikel` = '$deskripsiArtikel', `foto_artikel` = '$newfilename', `tanggal_artikel` = '$tanggalArtikel', `penulis_artikel` = '$penulisArtikel' WHERE `id_artikel` = '$ids'");
            if ($update_query) {
                echo "<script>
                alert ('artikel berhasil diubah');
                </script>";
                echo "<meta http-equiv='refresh' content='0;url=artikelAdmin.php'>";
            } else {
                echo "<script>
                alert ('Terjadi galat, artikel gagal diubah');
                </script>";
                echo "<meta http-equiv='refresh' content='0;url=update_artikel.php?id=$ids'>";
                // Tampilkan pesan kesalahan SQL
                var_dump(mysqli_error($conn));
            }
        } else {
            echo "<script>
            alert ('Sorry, there was an error uploading your file');
            </script>";
            echo "<meta http-equiv='refresh' content='0;url=update_artikel.php?id=$ids'>";
        }
    }
}
?>
