<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Member</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- JS BUAT HIDE AND SHOW NAMA MENTOR -->
    <script type="text/javascript">
      function munculTxtbox() {
         var elem = document.getElementById("status_mentoring");

         if(elem.value == "1") {
            document.getElementById("nama_mentor").style.visibility = "visible"; 
         } else {
           document.getElementById("nama_mentor").style.visibility = "hidden"; 
         }
      }
    </script>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add New Member</div>
        <div class="card-body">
          <?php $level = $this->session->userdata("level");?>

          <form method="post" action="<?php echo base_url('crudAnggota/aksi_addAnggota/').$level ?>"> <!-- sebelumnya yg didalem base url admin/aksi_anggota -->
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="nama_lengkap" id="inputFName" class="form-control" placeholder="Full Name" required="required">
                <label for="inputFName">Full Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="number" name="nim" id="inputNim" class="form-control" placeholder="NIM" required="required">
                    <label for="inputNim">NIM</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select name="fakultas" id="fakultas" class="form-control" required="required">
                      <option value="FEB">Fakultas Ekonomi dan Bisnis</option>
                      <option value="FF">Fakultas Farmasi</option>
                      <option value="FH">Fakultas Hukum</option>
                      <option value="FIB">Fakultas Ilmu Budaya</option>
                      <option value="FISIP">Fakultas Sosial dan Politik</option>
                      <option value="FK">Fakultas Kedokteran</option>
                      <option value="FKG">Fakultas Kedokteran Gigi</option>
                      <option value="FKH">Fakultas Kedokteran Hewan</option>
                      <option value="FKM">Fakultas Kesehatan Masyarakat</option>
                      <option value="FKP">Fakultas Keperawatan</option>
                      <option value="FPK">Fakultas Perikanan dan Kelautan</option>
                      <option value="FPSI">Fakultas Psikologi</option>
                      <option value="FST">Fakultas Sains dan Teknologi</option>
                      <option value="FV">Fakultas Vokasi</option> 
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="address" id="inputAddress" class="form-control" placeholder="Address" required="required">
                <label for="inputAddress">Address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="no_hp" id="inputNohp" class="form-control" placeholder="Phone Number" required="required">
                <label for="inputNohp">Phone Number</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select name="amanah" id="amanah" class="form-control" required="required">
                      <option value="1">Pengurus SKI Fakultas</option>
                      <option value="2">Pengurus UKMKI</option>
                      <option value="3">Bukan Pengurus UKMKI/SKI Fakultas</option>
                      <option value="4">Alumni UKMKI/SKI Fakultas</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select name="status_kdr" id="status_kdr" class="form-control" required="required">
                      <option value="1">Pra Mula</option>
                      <option value="2">Mula (Sudah PDK 1)</option>
                      <option value="3">Madya (Sudah PDK 2)</option>
                      <option value="4">Utama (Sudah PDK 3)</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select name="status_mentoring" id="status_mentoring" class="form-control" onchange="munculTxtbox()" required="required">
                      <option value="1">Sudah ada kelompok</option>
                      <option value="2">Belum ada kelompok</option>
                      <option value="3">Tidak bersedia mengikuti mentoring</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6" id="nama_mentor">
                  <div class="form-label-group">
                    <input type="text" name="nama_mentor" id="nama_mentor" class="form-control">
                    <label for="nama_mentor">Nama Mentor</label>
                  </div>
                </div>
              </div>
            </div>
            <input class="tombol-add" type="submit" name="submit" value="Add"/>
            <!-- <a class="btn btn-primary btn-block" type="submit">Add</a>-->
          </form>
          <!-- MEMILIH LINK PADA TOMBOL BACK SESUAI LEVEL ADMIN -->
          <?php 
            if($level == "SU"){ ?>
              <div class="text-center">
                <a class="d-block small mt-3" href="<?php echo base_url('superuser')?>">Back</a>
              </div>
           <?php }else{ ?>
              <div class="text-center">
                <a class="d-block small mt-3" href="<?php echo base_url('admin')?>">Back</a>
              </div>
          <?php } ?>
          <!-- -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
