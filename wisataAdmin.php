<?php
include "headerWisata.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Wisata</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Wisata</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-lg-3 col-xs-6"><a href="add_wisata.php" class="small-box-footer">
            <div class="small-box bg-green">
                  <div class="inner">
                      <H5>Tambah Wisata <i class="fa fa-arrow-circle-right"></i></H5>
                      <div class="icon">
                     <i class="fa fa-plus circle"></i>
                   </div>
                   </div>
                 </div></a>
           </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">





          <div class="col-md-12">
                         <div class="card">
                           <div class="card-header">
                             <h3 class="card-title">Daftar Wisata</h3>
                           </div>
                           <div class="card-body">
                           <table id="example1" class="table table-bordered table-striped">
                             <thead>
                               <tr>
                                 <th> NO</th>
                                 <th>JUDUL</th>
                                 <th> DESKRIPSI </th>
                                 <th> HTM</th>
                                 <th> FOTO</th>
                                 <th> LOKASI</th>
                                 <th> WAKTU</th>
                                 <th> TANGGAL</th>
                                 <th> KATEGORI</th>
                                 <th> REGIONAL</th>
                                 <th> EDIT</th>
                                 <th> DELETE</th>
                               </tr>
                              </thead>
                              <tbody>
                              <?php
                                $nomor = 1;
                                $result = mysqli_query($conn, "SELECT * FROM pameran ORDER BY id_pameran DESC");
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                ?>
                                  <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $row['judul_pameran']; ?></td>
                                    <td>
                                      <?php
                                      $deskripsi = $row['deskripsi_pameran'];
                                      echo strlen($deskripsi) > 100 ? substr($deskripsi, 0, 100) . ' ...' : $deskripsi;
                                      ?>
                                    </td>
                                    <td><?php echo $row['htm_pameran']; ?></td>
                                    <td><img src="img/wisata/<?php echo $row['foto_pameran']; ?>" alt="Wisata Image" style="max-width: 100px; max-height: 100px;"></td>
                                    <td><?php echo $row['lokasi_pameran']; ?></td>
                                    <td><?php echo $row['waktu_pameran']; ?></td>
                                    <td><?php echo $row['tanggal_pameran']; ?></td>
                                    <td>
                                      <?php
                                      $gets_kategori = mysqli_query($conn, "SELECT group_concat(nama_kategori) as nama_kategori FROM kategori k join pameran p on(k.id_kategori=p.id_kategori) where p.id_pameran='" . $row['id_pameran'] . "'");
                                      $baris_kategori = mysqli_fetch_array($gets_kategori, MYSQLI_ASSOC);
                                      $data_kategori = $baris_kategori['nama_kategori'];
                                      $kategori_lain = explode(',', $data_kategori);
                                      echo implode(', ', $kategori_lain);
                                      ?>
                                    </td>
                                    <td>
                                      <?php
                                      $gets_regional = mysqli_query($conn, "SELECT group_concat(nama_regional) as nama_regional FROM regional r join pameran p on(r.id_regional=p.id_regional) where p.id_pameran='" . $row['id_pameran'] . "'");
                                      $baris_regional = mysqli_fetch_array($gets_regional, MYSQLI_ASSOC);
                                      $data_regional = $baris_regional['nama_regional'];
                                      $regional_lain = explode(',', $data_regional);
                                      echo implode(', ', $regional_lain);
                                      ?>
                                    </td>
                                    <td><a style="color: white;" href="update_wisata.php?id=<?php echo $row['id_pameran'];?>"><button class="btn btn-primary btn-sm">Edit</button></a></td>
                                  <td><a style="color: white;" href="proses_hapus_wisata.php?id=<?php echo $row['id_pameran'];?>"><button class="btn btn-danger btn-sm">Remove</button></a></td>
                                  </tr>
                                <?php
                                  $nomor = $nomor + 1; }
                              ?>
                              </tbody>
                           </table>
                         </div>
                         </div>
                       </div>
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

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
        "paging": true,
         "lengthChange": true,
         "searching": true,
         "ordering": true,
         "info": false,
         "autoWidth": false,
         "responsive": false,
         "scrollX": true,
         "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>
</html>
