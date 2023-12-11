<?php
session_start();

if (!isset($_POST['nama_regional'])) {
    header('Location: update_lokasi.php');
    exit;
}

include "koneksi.php";

date_default_timezone_set('Asia/Bangkok');
$ids = $_POST['id_regional'];
$namaRegional = $_POST['nama_regional'];

$update_query = mysqli_query($conn, "UPDATE `regional` SET `nama_regional` = '$namaRegional' WHERE `id_regional` = '$ids'");

if ($update_query) {
    // Fetch the updated data
    $result_after_update = mysqli_query($conn, "SELECT * FROM `regional` WHERE `id_regional` = '$ids'");
    $updated_row = mysqli_fetch_array($result_after_update, MYSQLI_ASSOC);

    // Display the updated file information
    echo "Updated File Name: " . $updated_row['nama_regional'];

    // Redirect to the desired page
    header('Location: lokasiAdmin.php');
    exit;
} else {
    // Your existing code for update failure
    echo "<script>alert ('Terjadi galat, regional gagal diubah');</script>";
    echo "<meta http-equiv='refresh' content='0;url=update_regional.php?id=$ids'>";
    // Tampilkan pesan kesalahan SQL
    var_dump(mysqli_error($conn));
}
?>