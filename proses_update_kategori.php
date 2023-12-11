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

$update_query = mysqli_query($conn, "UPDATE `kategori` SET `nama_kategori` = '$namaKategori' WHERE `id_kategori` = '$ids'");

if ($update_query) {
    // Fetch the updated data
    $result_after_update = mysqli_query($conn, "SELECT * FROM `kategori` WHERE `id_kategori` = '$ids'");
    $updated_row = mysqli_fetch_array($result_after_update, MYSQLI_ASSOC);

    // Display the updated file information
    echo "Updated File Name: " . $updated_row['nama_kategori'];

    // Redirect to the desired page
    header('Location: kategoriAdmin.php');
    exit;
} else {
    // Your existing code for update failure
    echo "<script>alert ('Terjadi galat, kategori gagal diubah');</script>";
    echo "<meta http-equiv='refresh' content='0;url=update_kategori.php?id=$ids'>";
    // Tampilkan pesan kesalahan SQL
    var_dump(mysqli_error($conn));
}
?>