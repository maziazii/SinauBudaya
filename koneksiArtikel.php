<?php
include "koneksi.php";

if (isset($_POST['id'])) {
    $idArtikel = $_POST['id'];

    $query = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel = $idArtikel");
    $row = mysqli_fetch_assoc($query);

    echo "<h2>" . $row['judul_pameran'] . "</h2>";
    echo "<p>" . $row['deskripsi_pameran'] . "</p>";

    mysqli_close($conn);
}
?>