<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SinauBudaya-Artikel</title>
    <link rel="stylesheet" href="./css/style.css">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <!-- HEADER -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s" style="background-color: #001D23">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
          <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Sleman, Yogyakarta</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>themis@gmail.com</small>
          </div>
        </div>
  
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s" >
          <a href="index.php" class="navbar-brand ms-4 ms-lg-0" style="margin-left: 0;">
            <div style="display: flex; align-items: center; justify-content: flex-start; padding-left: 10px;">
              <img src="img/LogoSinauBudaya.png" alt="" style="width: 54px; height: 54px; margin-right: 0px;">
              <h1 class="fw-bold text-primary m-0" style="margin-left: 10px;">Sinau<span class="text-white">Budaya</span></h1>
            </div>
          </a>
          <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
              <a href="index.php" class="nav-item nav-link">Home</a>
              <a href="wisata.php" class="nav-item nav-link">Wisata</a>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lokasi</a>
                <div class="dropdown-menu m-0">
                  <a href="wisataSleman.php" class="dropdown-item">Kabupaten Sleman</a>
                  <a href="wisataYogyakarta.php" class="dropdown-item">Kota Yogyakarta</a>
                  <a href="wisataKulonProgo.php" class="dropdown-item">Kabupaten Kulon Progo</a>
                  <a href="wisataBantul.php" class="dropdown-item">Kabupaten Bantul</a>
                  <a href="wisataGunungkidul.php" class="dropdown-item">Kabupaten Gunungkidul</a>
                </div>
              </div>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                <div class="dropdown-menu m-0">
                  <a href="wisataPameran.php" class="dropdown-item">Pameran</a>
                  <a href="wisataPertunjukan.php" class="dropdown-item">Pertunjukan</a>
                </div>
              </div>
              <a href="artikel.php" class="nav-item nav-link active">Artikel</a>
              <a href="login.php" class="nav-item nav-link">Admin</a>
            </div>
          </div>
        </nav>
      </div>
    <!-- PENUTUP HEADER -->

    <!-- ARTIKEL BUDAYA -->
    <div class="container-fluid bg-light my-5 py-5">
      <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="">
          <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Ragam Artikel</div>
          <h1 class="display-6 mb-5">Informasi Artikel Budaya</h1>
        </div>
        <div class="row g-4 justify-content-center">
          <?php
          $result = mysqli_query($conn, "SELECT * FROM `artikel` ORDER BY id_artikel DESC");
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
              <img class="img-fluid mb-4" src=img/artikel/<?php echo $row['foto_artikel']; ?> alt="" />
              <h4 class="mb-3"><?php echo $row['judul_artikel'];?></h4>
              <p class="mb-4"><b><?php echo $row['penulis_artikel'];?></b> <?php echo $row['tanggal_artikel'];?></p> 
              <p class="mb-4">
                <?php
                  $deskripsi = $row['deskripsi_artikel'];
                  echo strlen($deskripsi) > 200 ? substr($deskripsi, 0, 200) . ' ...' : $deskripsi;
                ?>
              </p>
              <a class="btn btn-outline-primary px-3" href="artikelMore.php?id=<?= $row['id_artikel'] ?>">
                Read More
                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                  <i class="fa fa-arrow-right"></i>
                </div>
              </a>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <!-- ARTIKEL BUDAYA -->

    <!-- FOOTER -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h1 class="fw-bold text-primary mb-4">Sinau<span class="text-white">Budaya</span></h1>
            <p>Website ini dibuat untuk Tugas Besar mata kuliah Pengembangan Aplikasi Berbasis Web</p>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Address</h5>
            <p><i class="fa fa-map-marker-alt me-3"></i>Sleman, Yogyakarta</p>
            <p><i class="fa fa-envelope me-3"></i>themis@gmail.com</p>
          </div>
        </div>
      </div>
      <div class="container-fluid copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">&copy; <a href="#">Themis</a>, All Right Reserved.</div>
          </div>
        </div>
      </div>
    </div>
    <!-- PENUTUP FOOTER -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="path/to/your/js/main.js"></script>

</html>