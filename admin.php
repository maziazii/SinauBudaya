<?php
include "headerDash.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- WISATA small box -->
            <div class="small-box" style="background-color:#0766AD">
              <div class="inner" style="color:black">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(id_pameran) as jumlah FROM pameran");
                $dataBerita = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>

                <h3><?php echo $dataBerita['jumlah'];?></h3>

                <p>Jumlah Wisata</p>
              </div>
              <a href="wisataAdmin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- LOKASI small box -->
            <div class="small-box" style="background-color:#65B741">
              <div class="inner" style="color:black">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(id_regional) as jumlah FROM regional");
                $dataBerita = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>

                <h3><?php echo $dataBerita['jumlah'];?></h3>

                <p>Jumlah Lokasi</p>
              </div>
              <a href="lokasiAdmin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- KATEGORI small box -->
            <div class="small-box" style="background-color:#FFC436">
              <div class="inner" style="color:black">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(id_kategori) as jumlah FROM kategori");
                $dataBerita = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>

                <h3><?php echo $dataBerita['jumlah'];?></h3>

                <p>Jumlah Kategori</p>
              </div>
              <a href="kategoriAdmin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- ARTIKEL small box -->
            <div class="small-box" style="background-color:#FF6363">
              <div class="inner" style="color:black">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(id_artikel) as jumlah FROM artikel");
                $dataBerita = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>

                <h3><?php echo $dataBerita['jumlah'];?></h3>

                <p>Jumlah Artikel</p>
              </div>
              <a href="artikelAdmin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="background-color:#001D23; color:white">
    <strong>Copyright &copy; 2023 <a href="index2.php" style="color: white;">Themis Team</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<script src="dist/js/pages/dashboard.js"></script>

</body>
</html>
