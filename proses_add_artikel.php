<?php
session_start();
if (!isset($_POST['judul_artikel']) ) {
  header('Location:add_artikel.php');
  exit;
}
include "koneksi.php";

date_default_timezone_set('Asia/Bangkok');

$judulArtikel= $_POST['judul_artikel'];
$deskripsiArtikel= $_POST['deskripsi_artikel'];
$fotoArtikel= $_POST['foto_artikel'];
$tanggalArtikel= $_POST['tanggal_artikel'];
$penulisArtikel= $_POST['penulis_artikel'];

$dater2=date_create("$tanggalArtikel");
$tanggalArtikel = date_format($dater2,"Y-m-d");



 if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0 || $_FILES["fileToUpload"]["name"]=="")
{
    $newfilename = "-";
    $insert_query2 = mysqli_query($conn, "INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `deskripsi_artikel`, `foto_artikel`, `tanggal_artikel`, `penulis_artikel`) VALUES (NULL, '$judulArtikel', '$deskripsiArtikel', '$newfilename', '$tanggalArtikel', '$penulisArtikel'); ");
    if ($insert_query2){
    echo "<script>
    alert ('Artikel berhasil ditambahkan');
    </script>";
    echo "<meta http-equiv='refresh' content='0;url=adminArtikel.php'>";
    }

    else{
    echo "<script>
    alert ('Terjadi galat, Berita gagal ditambahkan');
    </script>";
    echo "<meta http-equiv='refresh' content='0;url=add_artikel.php'>";
    }
}

else{
$target_dir = "img/artikel/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
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
if($imageFileType != "jpg" && $imageFileType != "png" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 echo "<script>
            alert ('Cek Ukuran File, Tipe File');
            </script>";
            echo "<meta http-equiv='refresh' content='0;url=add_berita.php'>";

}

else {
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $newfilename)){

  $insert_query2 = mysqli_query($conn, "INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `deskripsi_artikel`, `foto_artikel`, `tanggal_artikel`, `penulis_artikel`) VALUES (NULL, '$judulArtikel', '$deskripsiArtikel', '$newfilename', '$tanggalArtikel', '$penulisArtikel'); ");
  if ($insert_query2){
  echo "<script>
  alert ('Artikel berhasil ditambahkan');
  </script>";
  echo "<meta http-equiv='refresh' content='0;url=artikelAdmin.php'>";
  }

  else{
  echo "<script>
  alert ('Terjadi galat, Berita gagal ditambahkan');
  </script>";
  echo "<meta http-equiv='refresh' content='0;url=add_artikel.php'>";
  }
  } else {
      echo "<script>
            alert ('Sorry, there was an error uploading your file');
            </script>";
            echo "<meta http-equiv='refresh' content='0;url=add_artikel.php'>";
  }
}
}



//--------------------------------------------------------------------------------------------------------------------------









?>

