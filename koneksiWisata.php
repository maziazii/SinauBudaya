<?php
include "koneksi.php";

if (isset($_POST['id'])) {
    $idWisata = $_POST['id'];

    $query = mysqli_query($conn, "SELECT * FROM pameran WHERE id_pameran = $idWisata");
    $row = mysqli_fetch_assoc($query);

    echo "<h2>" . $row['nama_pameran'] . "</h2>";
    echo "<p>" . $row['deskripsi_pameran'] . "</p>";

    mysqli_close($conn);
}
?>