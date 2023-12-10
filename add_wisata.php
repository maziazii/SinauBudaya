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
              <li class="breadcrumb-item"><a href="artikelAdmin.php"> Wisata</a></li>
              <li class="breadcrumb-item active">Add Wisata</li>
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
          <div class="col-md-12">
                         <div class="card">
                           <div class="card-header">
                             <h3 class="card-title">Form Tambah Wisata</h3>
                           </div>
                           <div class="card-body">
                               <form role="form" method="POST" action="proses_add_wisata.php" enctype="multipart/form-data">
                                <div class="form-group row">
                                  <div class="col-sm-2 col-form-label"><label for="exampleInputJudul">Judul</label></div>
                                  <div class="col-sm-10"> <input  required type="text" class="form-control" id="Judul" placeholder="Masukan Judul Wisata" name="judul_pameran"></div>
                                </div>
                                  <div class="form-group row">
                                  <div class="col-sm-2 col-form-label"><label for="exampleInputDeskripsi">Deskripsi</label></div><div class="col-sm-10"> <textarea required class="form-control" id="Deskrisi" placeholder="Masukan Deskripsi Wisata" name="deskripsi_pameran"></textarea></div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-2 col-form-label"><label for="exampleInputHTM">HTM</label></div>
                                  <div class="col-sm-10"> <input  required type="text" class="form-control" id="HTM" placeholder="Masukan Harga Tiket Masuk" name="htm_pameran"></div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-2 col-form-label">
                                  <label for="exampleInputFile">Foto</label>
                                </div>
                                <div class="col-sm-10">
                                  <input type="file" id="exampleInputFile" name="fileToUpload" >
                                  <p class="help-block">
                                <label  style=" color:red"class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> File Max 1 mb (Wajib dalam format PNG/ JPG)</label></div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-2 col-form-label"><label for="exampleInputLokasi">Lokasi</label></div>
                                  <div class="col-sm-10"> <input  required type="text" class="form-control" id="Lokasi" placeholder="Masukan Lokasi Wisata" name="lokasi_pameran"></div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-2 col-form-label"><label for="exampleInputWaktu">Waktu</label></div>
                                  <div class="col-sm-10"> <input  required type="text" class="form-control" id="Waktu" placeholder="Masukan Waktu Berlangsungnya" name="waktu_pameran"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label"><label for="exampleInputTgl">Tanggal</label></div>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            <input type="text" class="form-control datetimepicker-input" name="tanggal_pameran" data-target="#reservationdate"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label"><label for="exampleInputKategori">Kategori</label></div>
                                    <div class="col-sm-10">
                                        <select name="nama_kategori" class="form-control select2" placeholder="Pilih Kategori">
                                            <?php
                                            $results_kategori = mysqli_query($conn, "SELECT * FROM kategori");
                                            $option_kategori = '';
                                            while ($row_kategori = mysqli_fetch_array($results_kategori, MYSQLI_ASSOC)) {
                                                if (ucwords($_SESSION['nama_kategori']) == ucwords($row_kategori['nama_kategori'])) {
                                                    $option_kategori .= '<option disabled value="' . $row_kategori['id_kategori'] . '">' . $row_kategori['nama_kategori'] . '</option>';
                                                } else {
                                                    $option_kategori .= '<option value="' . $row_kategori['id_kategori'] . '">' . $row_kategori['nama_kategori'] . ' </option>';
                                                }
                                            }
                                            echo $option_kategori;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label"><label for="exampleInputRegional">Regional</label></div>
                                    <div class="col-sm-10">
                                        <select name="nama_regional" class="form-control select2" data-placeholder="Pilih Regional">
                                            <?php
                                            $results_regional = mysqli_query($conn, "SELECT * FROM regional");
                                            $option_regional = '';
                                            while ($row_regional = mysqli_fetch_array($results_regional, MYSQLI_ASSOC)) {
                                                if (ucwords($_SESSION['nama_regional']) == ucwords($row_regional['nama_regional'])) {
                                                    $option_regional .= '<option disabled value="' . $row_regional['id_regional'] . '">' . $row_regional['nama_regional'] . '</option>';
                                                } else {
                                                    $option_regional .= '<option value="' . $row_regional['id_regional'] . '">' . $row_regional['nama_regional'] . ' </option>';
                                                }
                                            }
                                            echo $option_regional;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10 mx-auto text-center">
                                  <button type="submit" class="btn btn-warning btn-block" style="background-color: #FE6F0F; border-color: #FE6F0F;"><b>Submit</b></button>
                                </div>
                              </form>
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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>
