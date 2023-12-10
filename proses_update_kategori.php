<?php
session_start();
if (!isset($_POST['nama_kategori'])) {
    header('Location: update_kategori.php');
    exit;
}
include "koneksi.php";

date_default_timezone_set('Asia/Bangkok');

$ids = $_POST['id_kategori'];
$namaKategori = $_POST['nama_kategori'];

if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0 || $_FILES["fileToUpload"]["name"] == "") {
    $newfilename = "-";
    $update_query2 = mysqli_query($conn, "UPDATE `kategori` SET `nama_kategori` = '$namaKategori' WHERE `id_kategori` = '$ids'");
    if ($update_query2) {
        // Fetch the updated data
        $result_after_update = mysqli_query($conn, "SELECT * FROM `kategori` WHERE `id_kategori` = '$ids'");
        $updated_row = mysqli_fetch_array($result_after_update, MYSQLI_ASSOC);
    
        // Display the updated file information
        echo "Updated File Name: " . $updated_row['nama_kategori'];
    } else {
        // Your existing code for update failure
        echo "<script>alert ('Terjadi galat, kategori gagal diubah');</script>";
        echo "<meta http-equiv='refresh' content='0;url=update_kategori.php?id=$ids'>";
        // Tampilkan pesan kesalahan SQL
        var_dump(mysqli_error($conn));
    }
} else {
    $target_dir = "img/wisata/";
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
        echo "<script>alert ('Cek Ukuran File, Tipe File');</script>";
        echo "<meta http-equiv='refresh' content='0;url=update_kategori.php?id=$ids'>";
    } else {
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $newfilename)) {

            $update_query = mysqli_query($conn, "UPDATE `kategori` SET `nama_kategori` = '$namaKategori' WHERE `id_kategori` = '$ids'");
            if ($update_query) {
                echo "<script>alert ('Kategori berhasil diubah');</script>";
                echo "<meta http-equiv='refresh' content='0;url=kategoriAdmin.php'>";
            } else {
                echo "<script>alert ('Terjadi galat, kategori gagal diubah');</script>";
                echo "<meta http-equiv='refresh' content='0;url=update_kategori.php?id=$ids'>";
                // Tampilkan pesan kesalahan SQL
                var_dump(mysqli_error($conn));
            }
        } else {
            echo "<script>alert ('Sorry, there was an error uploading your file');</script>";
            echo "<meta http-equiv='refresh' content='0;url=update_kategori.php?id=$ids'>";
        }
    }
}
?>
